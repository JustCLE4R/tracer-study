<?php

namespace App\Http\Controllers\AdminFakultas;

use App\Models\User;
use App\Models\Pekerja;
use App\Models\Wirausaha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminFakultas\UpdateUserRequest;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = User::where('id', '!=', Auth::id())
                    ->where('fakultas', Auth::user()->fakultas)
                    ->latest();

        if (request('search')) {
            $query->where(function($query) {
                $query->where('nama', 'like', '%' . request('search') . '%')
                    ->orWhere('nim', 'like', '%' . request('search') . '%')
                    ->orWhere('email', 'like', '%' . request('search') . '%');
            });
        }
        
        return view('dashboard.admin-fakultas.user.index', [
            'users' => $query->paginate(20)->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        if ($user->fakultas != Auth::user()->fakultas) {
            return redirect('/dashboard/admin/fakultas/user')->with('error', 'User not found!');
        };

        $user->load(['pendidikan', 'career']);

        $pekerjaans = Pekerja::select(DB::raw("'pekerja' as tipe_kerja"), 'id', 'jabatan_pekerjaan', 'detail_pekerjaan', 'is_active', 'tgl_mulai_kerja as tanggal_mulai', 'tgl_akhir_kerja as tanggal_akhir')
        ->where('user_id', $user->id);

        $wirausaha = Wirausaha::select(DB::raw("'wirausaha' as tipe_kerja"), 'id', DB::raw("'a'"), 'nama_usaha', 'is_active', 'tgl_mulai_usaha as tanggal_mulai', 'tgl_akhir_usaha as tanggal_akhir')
                ->where('user_id', $user->id);

        $unioned = $pekerjaans->union($wirausaha)->orderBy('is_active', 'desc')->orderBy('tanggal_mulai', 'asc')->orderBy('tipe_kerja', 'desc')->get();

        return view('dashboard.admin-fakultas.user.show', [
            'user' => $user,
            'pekerjaans' => $unioned
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        if($user->fakultas != Auth::user()->fakultas) {
            return redirect('/dashboard/admin/fakultas/user')->with('error', 'User not found!');
        };

        return view('dashboard.admin-fakultas.user.edit', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        if($user->fakultas != Auth::user()->fakultas) {
            return redirect('/dashboard/admin/fakultas/user')->with('error', 'User not found!');
        };

        $user->update($request->all());
        return redirect('/dashboard/admin/fakultas/user/' . $user->id)->with('success', 'Profil berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if($user->fakultas != Auth::user()->fakultas) {
            return redirect('/dashboard/admin/fakultas/user')->with('error', 'User not found!');
        };

        $user->delete();
        return redirect('/dashboard/admin/fakultas/user')->with('success', 'User has been deleted!');
    }
}
