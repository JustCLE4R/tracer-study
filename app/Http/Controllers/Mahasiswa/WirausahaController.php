<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Models\Wirausaha;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class WirausahaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return abort(404);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return abort(404);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store($request)
    {
        $rules = $request->validate([
            'pekerjaan' => 'required|string',
            'status-pekerjaan' => 'required|string',
            'nama-usaha' => 'required|string|max:255',
            'tingkat-ukuran-tempat-usaha' => 'required|string',
            'bidang-usaha' => 'required|string|in:a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u',
            'detail-usaha' => 'required|string|max:255',
            'jumlah-pendapatan-perbulan-omset-penjualan' => 'required|numeric|min:0|max:1000000000',
            'jumlah-pendapatan-bersih-perbulan' => 'required|numeric|min:0|max:1000000000',
            'pemodal-saat-ini' => 'required|array|min:1|max:4|in:a,b,c,d',
            'kesesuaian-usaha-dengan-prodi' => 'required|string|in:a,b,c',
            'tanggal-mulai-usaha' => 'required|date',
            'tanggal-akhir-usaha' => 'nullable|date',
            'provinsi' => 'required|string|max:255',
            'kabupaten' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'fotobukti-telah-berwirausaha' => 'required|file|mimes:jpeg,png,jpg,gif,svg,pdf|max:2048',
        ], [
            'required' => 'Kolom :attribute wajib diisi.',
            'string' => 'Kolom :attribute harus berupa teks.',
            'in' => 'Kolom :attribute tidak valid.',
            'numeric' => 'Kolom :attribute harus berupa angka.',
            'email' => 'Kolom :attribute harus berupa alamat email yang valid.',
            'date' => 'Kolom :attribute harus berupa tanggal yang valid.',
            'image' => 'Kolom :attribute harus berupa gambar.',
            'mimes' => 'Kolom :attribute harus memiliki format: :values.',
            'min' => 'Kolom :attribute minimal :min.',
            'max' => 'Kolom :attribute tidak boleh lebih dari :max',
        ], [
            'pekerjaan' => 'Pekerjaan',
            'status-pekerjaan' => 'Status Pekerjaan',
            'nama-usaha' => 'Nama Usaha',
            'tingkat-ukuran-tempat-usaha' => 'Tingkat Ukuran Tempat Usaha',
            'bidang-usaha' => 'Bidang Usaha',
            'detail-usaha' => 'Detail Usaha',
            'jumlah-pendapatan-perbulan-omset-penjualan' => 'Jumlah Pendapatan Per Bulan (Omset Penjualan)',
            'jumlah-pendapatan-bersih-perbulan' => 'Jumlah Pendapatan Bersih Per Bulan',
            'pemodal-saat-ini' => 'Pemodal Saat Ini',
            'kesesuaian-usaha-dengan-prodi' => 'Kesesuaian Pekerjaan dengan Program Studi',
            'tanggal-mulai-berusaha' => 'Tanggal Mulai Berusaha',
            'tanggal-akhir-usaha' => 'Tanggal Akhir Usaha',
            'provinsi' => 'Provinsi',
            'kabupaten' => 'Kabupaten',
            'alamat' => 'Alamat',
            'fotobukti-telah-berwirausaha' => 'Fotobukti Telah Berwirausaha',
        ]);

        $dataAkhirUsaha = [];
        if (isset($rules['tanggal-akhir-usaha'])) {
            $dataAkhirUsaha = [
                'is_active' => 0,
                'tgl_akhir_usaha' => $rules['tanggal-akhir-usaha'],
            ];
        }

        $dataPrepare = [
            'user_id' => Auth::user()->id,
            'nama_usaha' => $rules['nama-usaha'],
            'tingkat_tempat_usaha' => $rules['tingkat-ukuran-tempat-usaha'],
            'bidang_usaha' => $rules['bidang-usaha'],
            'detail_usaha' => $rules['detail-usaha'],
            'omset' => $rules['jumlah-pendapatan-perbulan-omset-penjualan'],
            'pendapatan' => $rules['jumlah-pendapatan-bersih-perbulan'],
            'pemodal' => json_encode($rules['pemodal-saat-ini']),
            'kesesuaian' => $rules['kesesuaian-usaha-dengan-prodi'],
            'tgl_mulai_usaha' => $rules['tanggal-mulai-usaha'],
            'provinsi_usaha' => $rules['provinsi'],
            'kabupaten_usaha' => $rules['kabupaten'],
            'alamat_usaha' => $rules['alamat'],
            'bukti_berusaha' => $request->file('fotobukti-telah-berwirausaha')->store('bukti-wirausaha'),
        ] + $dataAkhirUsaha;

        $wirausaha = Wirausaha::create($dataPrepare);

        $lamaMendapatkanPekerjaan = (strtotime($wirausaha->tgl_mulai_usaha) - strtotime(Auth::user()->tgl_wisuda)) / (60 * 60 * 24);
        if(Auth::user()->lama_mendapatkan_pekerjaan == null || Auth::user()->lama_mendapatkan_pekerjaan > $lamaMendapatkanPekerjaan){
            Auth::user()->update([
                'lama_mendapatkan_pekerjaan' => $lamaMendapatkanPekerjaan
            ]);
        } 

        if(Auth::user()->wirausaha->count() > 1 || Auth::user()->pekerja->count() > 1){
            return redirect('/dashboard/perjalanan-karir')->with('success', 'Data pekerjaan berhasil ditambahkan!');
        }

        return redirect('/dashboard/questioner')->with('success', 'Data Wirausaha telah ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Wirausaha $wirausaha)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Wirausaha $wirausaha)
    {
        // allowing admin with same faculty to edit the resource
        if (
            ($wirausaha->user_id != Auth::user()->id && Auth::user()->role == 'mahasiswa')
            ||
            (Auth::user()->fakultas != $wirausaha->user->fakultas && Auth::user()->role == 'admin')
        ) {
            return abort(403);
        }

        return view('dashboard.mahasiswa.perjalanan-karir.kerja.editWirausaha', [
            'wirausaha' => $wirausaha
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Wirausaha $wirausaha)
    {
        // allowing admin with same faculty to edit the resource
        if (
            ($wirausaha->user_id != Auth::user()->id && Auth::user()->role == 'mahasiswa')
            ||
            (Auth::user()->fakultas != $wirausaha->user->fakultas && Auth::user()->role == 'admin')
        ) {
            return abort(403);
        }

        $rules = $request->validate([
            'nama-usaha' => 'required|string|max:255',
            'tingkat-ukuran-tempat-usaha' => 'required|string',
            'bidang-usaha' => 'required|string|in:a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u',
            'detail-usaha' => 'required|string|max:255',
            'jumlah-pendapatan-perbulan-omset-penjualan' => 'required|numeric',
            'jumlah-pendapatan-bersih-perbulan' => 'required|numeric',
            'pemodal-saat-ini' => 'required|array|min:1|max:4|in:a,b,c,d',
            'kesesuaian-usaha-dengan-prodi' => 'required|string|in:a,b,c',
            'tanggal-mulai-usaha' => 'required|date',
            'tanggal-akhir-usaha' => 'nullable|date',
            'provinsi' => 'required|string|max:255',
            'kabupaten' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'fotobukti-telah-berwirausaha' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg,pdf|max:2048',
        ], [
            'required' => 'Kolom :attribute wajib diisi.',
            'string' => 'Kolom :attribute harus berupa teks.',
            'in' => 'Kolom :attribute tidak valid.',
            'numeric' => 'Kolom :attribute harus berupa angka.',
            'email' => 'Kolom :attribute harus berupa alamat email yang valid.',
            'date' => 'Kolom :attribute harus berupa tanggal yang valid.',
            'image' => 'Kolom :attribute harus berupa gambar.',
            'mimes' => 'Kolom :attribute harus memiliki format: :values.',
            'max' => 'Kolom :attribute tidak boleh lebih dari :max',
        ], [
            'nama-usaha' => 'Nama Usaha',
            'tingkat-ukuran-tempat-usaha' => 'Tingkat Ukuran Tempat Usaha',
            'bidang-usaha' => 'Bidang Usaha',
            'detail-usaha' => 'Detail Usaha',
            'jumlah-pendapatan-perbulan-omset-penjualan' => 'Jumlah Pendapatan Per Bulan (Omset Penjualan)',
            'jumlah-pendapatan-bersih-perbulan' => 'Jumlah Pendapatan Bersih Per Bulan',
            'pemodal-saat-ini' => 'Pemodal Saat Ini',
            'kesesuaian-usaha-dengan-prodi' => 'Kesesuaian Usaha dengan Program Studi',
            'tanggal-mulai-berusaha' => 'Tanggal Mulai Berusaha',
            'tanggal-akhir-usaha' => 'Tanggal Akhir Usaha',
            'provinsi' => 'Provinsi',
            'kabupaten' => 'Kabupaten',
            'alamat' => 'Alamat',
            'fotobukti-telah-berwirausaha' => 'Fotobukti Telah Berwirausaha',
        ]);

        $dataAkhirUsaha = [];
        if (isset($rules['tanggal-akhir-usaha'])) {
            $dataAkhirUsaha = [
                'is_active' => 0,
                'tgl_akhir_usaha' => $rules['tanggal-akhir-usaha'],
            ];
        } else {
            $dataAkhirUsaha = [
                'is_active' => 1,
                'tgl_akhir_usaha' => null,
            ];
        }

        $dataPrepare = [
            // 'user_id' => Auth::user()->id,
            'nama_usaha' => $rules['nama-usaha'],
            'tingkat_tempat_usaha' => $rules['tingkat-ukuran-tempat-usaha'],
            'bidang_usaha' => $rules['bidang-usaha'],
            'detail_usaha' => $rules['detail-usaha'],
            'omset' => $rules['jumlah-pendapatan-perbulan-omset-penjualan'],
            'pendapatan' => $rules['jumlah-pendapatan-bersih-perbulan'],
            'pemodal' => json_encode($rules['pemodal-saat-ini']),
            'kesesuaian' => $rules['kesesuaian-usaha-dengan-prodi'],
            'tgl_mulai_usaha' => $rules['tanggal-mulai-usaha'],
            'provinsi_usaha' => $rules['provinsi'],
            'kabupaten_usaha' => $rules['kabupaten'],
            'alamat_usaha' => $rules['alamat'],
        ] + $dataAkhirUsaha;

        if (isset($rules['fotobukti-telah-berwirausaha'])) {
            Storage::delete($wirausaha->bukti_berusaha);
            $dataPrepare['bukti_berusaha'] = $request->file('fotobukti-telah-berwirausaha')->store('bukti-wirausaha');
        }

        $wirausaha->update($dataPrepare);

        $lamaMendapatkanPekerjaan = (strtotime($wirausaha->tgl_mulai_usaha) - strtotime(Auth::user()->tgl_wisuda)) / (60 * 60 * 24);
        if(Auth::user()->lama_mendapatkan_pekerjaan == null || Auth::user()->lama_mendapatkan_pekerjaan > $lamaMendapatkanPekerjaan){
            Auth::user()->update([
                'lama_mendapatkan_pekerjaan' => $lamaMendapatkanPekerjaan
            ]);
        } 

        if (Auth::user()->role != 'mahasiswa') {
            return redirect('/dashboard/admin/' . $wirausaha->user->id)->with('success', 'Data pekerjaan berhasil diubah!');
        }

        return redirect('/dashboard/perjalanan-karir')->with('success', 'Data Wirausaha telah diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Wirausaha $wirausaha)
    {
        // allowing admin with same faculty to delete the resource
        if (
            ($wirausaha->user_id != Auth::user()->id && Auth::user()->role == 'mahasiswa')
            ||
            (Auth::user()->fakultas != $wirausaha->user->fakultas && Auth::user()->role == 'admin')
        ) {
            return abort(403);
        }

        if ($wirausaha->bukti_berusaha) {
            Storage::delete($wirausaha->bukti_berusaha);
        }
        $wirausaha->delete();

        if (Auth::user()->role != 'mahasiswa') {
            return redirect('/dashboard/admin/' . $wirausaha->user->id)->with('success', 'Data pekerjaan berhasil diubah!');
        }

        return redirect('/dashboard/perjalanan-karir')->with('success', 'Berhasil menghapus data!');
    }
}