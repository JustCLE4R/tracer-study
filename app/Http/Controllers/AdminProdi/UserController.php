<?php

namespace App\Http\Controllers\AdminProdi;

use App\Models\User;
use App\Models\Pekerja;
use App\Models\Wirausaha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AdminProdi\UpdateUserRequest;
use App\Models\ApiIntegration;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = User::where('id', '!=', Auth::id())
                    ->where('program_studi', Auth::user()->program_studi)
                    ->latest();

        if (request('search')) {
            $query->where(function($query) {
                $query->where('nama', 'like', '%' . request('search') . '%')
                    ->orWhere('nim', 'like', '%' . request('search') . '%')
                    ->orWhere('email', 'like', '%' . request('search') . '%');
            });
        }
        
        return view('dashboard.admin-prodi.user.index', [
            'users' => $query->paginate(20)->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $searchData = session('data');

        return view('dashboard.admin-prodi.user.create',[
            'searchData' => $searchData
        ]);
    }

    public function searchUser(Request $request)
    {
        $searchTarget = $request->search;

        $data = (new ApiIntegration)->getAlumniData($searchTarget);

        if(isset($data['modelError'])){
            return redirect('/dashboard/admin/prodi/user/create')->with('error', $data['modelError']);
        }

        if(!isset($data['DataAlumni'][0]['nim'])){
            return redirect('/dashboard/admin/prodi/user')->with('error', 'NIM tidak ditemukan');
        }

        $data = $data['DataAlumni'][0];

        return redirect('/dashboard/admin/prodi/user/create')->with('data', $data);
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
        if ($user->program_studi != Auth::user()->program_studi) {
            return redirect('/dashboard/admin/prodi/user')->with('error', 'User not found!');
        };

        $user->load(['pendidikan', 'career']);

        $pekerjaans = Pekerja::select(DB::raw("'pekerja' as tipe_kerja"), 'id', 'jabatan_pekerjaan', 'detail_pekerjaan', 'is_active', 'tgl_mulai_kerja as tanggal_mulai', 'tgl_akhir_kerja as tanggal_akhir')
        ->where('user_id', $user->id);

        $wirausaha = Wirausaha::select(DB::raw("'wirausaha' as tipe_kerja"), 'id', DB::raw("'a'"), 'nama_usaha', 'is_active', 'tgl_mulai_usaha as tanggal_mulai', 'tgl_akhir_usaha as tanggal_akhir')
                ->where('user_id', $user->id);

        $unioned = $pekerjaans->union($wirausaha)->orderBy('is_active', 'desc')->orderBy('tanggal_mulai', 'asc')->orderBy('tipe_kerja', 'desc')->get();

        return view('dashboard.admin-prodi.user.show', [
            'user' => $user,
            'pekerjaans' => $unioned
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        if ($user->program_studi != Auth::user()->program_studi) {
            return redirect('/dashboard/admin/prodi/user')->with('error', 'User not found!');
        };

        return view('dashboard.admin-prodi.user.edit', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        if ($user->program_studi != Auth::user()->program_studi) {
            return redirect('/dashboard/admin/prodi/user')->with('error', 'User not found!');
        };

        $user->update($request->all());
        return redirect('/dashboard/admin/prodi/user/' . $user->id)->with('success', 'Profil berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if ($user->program_studi != Auth::user()->program_studi) {
            return redirect('/dashboard/admin/prodi/user')->with('error', 'User not found!');
        };

        $user->delete();
        return redirect('/dashboard/admin/prodi/user')->with('success', 'User has been deleted!');
    }
}
