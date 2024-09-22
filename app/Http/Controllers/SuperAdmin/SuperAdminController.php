<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Models\User;
use App\Models\Pekerja;
use App\Models\Wirausaha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SuperAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = User::where('id', '!=', Auth::id())->latest();

        if (request('search')) {
            $query->where(function($query) {
                $query->where('nama', 'like', '%' . request('search') . '%')
                    ->orWhere('nim', 'like', '%' . request('search') . '%')
                    ->orWhere('email', 'like', '%' . request('search') . '%');
            });
        }
        
        if(Auth::user()->role == 'admin'){
            $query->where(function($query) {
                $query->where('fakultas', Auth::user()->fakultas)
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
        if(Auth::user()->fakultas != $user->fakultas && Auth::user()->role != 'superadmin') {
            abort(403);
        }

        $user->load(['pendidikan', 'career']);

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
        if(Auth::user()->fakultas != $user->fakultas && Auth::user()->role != 'superadmin') {
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
        $rules = $request->validate([
            'telepon' => 'numeric|required',
            'email' => 'email|max:255',
            'linkedin' => 'nullable|url',
            'facebook' => 'nullable|url',
            'tgl_lulus' => 'required|date|before:today',
            'tgl_yudisium' => 'required|date|before:today',
            'tgl_wisuda' => 'required|date|before:today',
            'judul_tugas_akhir' => 'required|string|max:255',
            'provinsi' => 'required|string|max:255',
            'kabupaten' => 'required|string|max:255',
            'kecamatan' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
        ], [
            'required' => 'Kolom :attribute wajib diisi.',
            'numeric' => 'Kolom :attribute harus berupa angka.',
            'email' => 'Kolom :attribute harus berupa alamat email yang valid.',
            'url' => 'Kolom :attribute harus berupa URL yang valid.',
            'date' => 'Kolom :attribute harus berupa tanggal yang valid',
            'before' => 'Kolom :attribute harus sebelum tanggal hari ini.',
            'string' => 'Kolom :attribute harus berupa teks.',
            'max' => 'Kolom :attribute tidak boleh lebih dari :max karakter.',
        ], [
            'telepon' => 'Telepon',
            'email' => 'Email',
            'linkedin' => 'Linkedin',
            'facebook' => 'Facebook',
            'tgl_lulus' => 'Tanggal Lulus',
            'tgl_yudisium' => 'Tanggal Yudisium',
            'tgl_wisuda' => 'Tanggal Wisuda',
            'judul_tugas_akhir' => 'Judul Tugas Akhir',
            'provinsi' => 'Provinsi',
            'kabupaten' => 'Kabupaten',
            'kecamatan' => 'Kecamatan',
            'alamat' => 'Alamat',
        ]);
        
        
        $user->update($rules);
        return redirect('/dashboard/admin/' . $user->id)->with('success', 'Profil berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
