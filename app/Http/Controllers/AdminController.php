<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pekerja;
use App\Models\Wirausaha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = User::where('id', '!=', Auth()->id())->latest();

        if (request('search')) {
            $query->where(function($query) {
                $query->where('nama', 'like', '%' . request('search') . '%')
                    ->orWhere('nim', 'like', '%' . request('search') . '%')
                    ->orWhere('email', 'like', '%' . request('search') . '%');
            });
        }
        
        if(Auth()->user()->role == 'admin'){
            $query->where(function($query) {
                $query->where('fakultas', Auth()->user()->fakultas)
                    ->where('role', 'mahasiswa');
            });
        }
        
        return view('dashboard.admin.index', [
            'users' => $query->paginate(50)->withQueryString()
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
        if(auth()->user()->fakultas != $user->fakultas && auth()->user()->role != 'superadmin') {
            abort(403);
        }

        $pekerjaans = Pekerja::select(DB::raw("'pekerja' as tipe_kerja"), 'id', 'jabatan_pekerjaan', 'detail_pekerjaan', 'is_active', 'tgl_mulai_kerja as tanggal_mulai', 'tgl_akhir_kerja as tanggal_akhir')
        ->where('user_id', $user->id);

        $wirausaha = Wirausaha::select(DB::raw("'wirausaha' as tipe_kerja"), 'id', DB::raw("'a'"), 'nama_usaha', 'is_active', 'tgl_mulai_usaha as tanggal_mulai', 'tgl_akhir_usaha as tanggal_akhir')
                ->where('user_id', $user->id);

        $unioned = $pekerjaans->union($wirausaha)->orderBy('is_active', 'desc')->orderBy('tanggal_mulai', 'asc')->orderBy('tipe_kerja', 'desc')->get();

        return view('dashboard.admin.show', [
            'user' => $user,
            'pekerjaans' => $unioned
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        if(auth()->user()->fakultas != $user->fakultas && auth()->user()->role != 'superadmin') {
            abort(403);
        }

        return view('dashboard.admin.editProfile', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        dd($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }

    // public function route()
    // {
    //     return 'user';
    // }
}
