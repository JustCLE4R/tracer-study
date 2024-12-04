<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Models\Pekerja;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ApiIntegration;
use Illuminate\Validation\Rule;
use App\Models\DetailPerusahaan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PekerjaController extends Controller
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
            'pekerjaan' => 'required|string|max:255',
            'status-pekerjaan' => 'required|string|max:255',
            'kriteria-pekerjaan' => 'required|string|in:a,b,c,d',
            'bidang-pekerjaan' => 'required|string|in:a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u',
            'tingkat-ukuran-tempat-bekerja' => 'required|string|in:a,b,c',
            'posisi-jabatan-pekerjaan' => 'required|string|in:a,b,c,d,e,f',
            'detail-pekerjaan' => 'required|string|max:255',
            'jumlah-pendapatan-perbulan' => 'required|numeric|min:0|max:1000000000',
            'kesesuaian-pekerjaan-dengan-prodi' => 'required|string|in:a,b,c',
            'tanggal-mulai-bekerja' => 'required|date',
            'tanggal-akhir-kerja-kosongkan-jika-masih-bekerja' => 'nullable|date',
            'provinsi' => 'required|string|max:255',
            'kabupaten' => 'required|string|max:255',
            'fotobukti-telah-bekerja' => 'required|file|mimes:jpeg,png,jpg,gif,svg,pdf|max:2048',

            // info perusahaan
            'nama-perusahaan' => [Rule::requiredIf($request->input('kriteria-pekerjaan') != 'd'), 'string', 'max:255'],
            'nama-atasan' => [Rule::requiredIf($request->input('kriteria-pekerjaan') != 'd'), 'string', 'max:255'],
            'posisi-jabatan-atasan' => [Rule::requiredIf($request->input('kriteria-pekerjaan') != 'd'), 'string', 'max:255'],
            'nomor-telepon-atasan' => [Rule::requiredIf($request->input('kriteria-pekerjaan') != 'd'), 'string', 'max:255'],
            'alamat-perusahaan' => [Rule::requiredIf($request->input('kriteria-pekerjaan') != 'd'), 'string', 'max:255'],
            'alamat-email-aktif-atasan' => [Rule::requiredIf($request->input('kriteria-pekerjaan') != 'd'), 'email'],
        ], [
            'required' => 'Kolom :attribute wajib diisi.',
            'string' => 'Kolom :attribute harus berupa teks.',
            'in' => 'Kolom :attribute tidak valid.',
            'numeric' => 'Kolom :attribute harus berupa angka.',
            'email' => 'Kolom :attribute harus berupa alamat email yang valid.',
            'date' => 'Kolom :attribute harus berupa tanggal yang valid.',
            'image' => 'Kolom :attribute harus berupa gambar.',
            'mimes' => 'Kolom :attribute harus memiliki format: :values.',
            'min' => 'Kolom :attribute harus minimal :min',
            'max' => 'Kolom :attribute tidak boleh lebih dari :max',
        ], [
            'pekerjaan' => 'Pekerjaan',
            'status-pekerjaan' => 'Status Pekerjaan',
            'kriteria-pekerjaan' => 'Kriteria Pekerjaan',
            'bidang-pekerjaan' => 'Bidang Pekerjaan',
            'tingkat-ukuran-tempat-bekerja' => 'Tingkat Ukuran Tempat Bekerja',
            'posisi-jabatan-pekerjaan' => 'Posisi Jabatan Pekerjaan',
            'detail-pekerjaan' => 'Detail Pekerjaan',
            'jumlah-pendapatan-perbulan' => 'Jumlah Pendapatan Per Bulan',
            'kesesuaian-pekerjaan-dengan-prodi' => 'Kesesuaian Pekerjaan dengan Program Studi',
            'tanggal-mulai-bekerja' => 'Tanggal Mulai Bekerja',
            'tanggal-akhir-kerja-kosongkan-jika-masih-bekerja' => 'Tanggal Akhir Bekerja',
            'provinsi' => 'Provinsi',
            'kabupaten' => 'Kabupaten',
            'fotobukti-telah-bekerja' => 'Foto Bukti Telah Bekerja',

            // info perusahaan
            'nama-perusahaan' => 'Nama Perusahaan',
            'nama-atasan' => 'Nama Atasan',
            'posisi-jabatan-atasan' => 'Posisi Jabatan Atasan',
            'nomor-telepon-atasan' => 'Nomor Telepon Atasan',
            'alamat-perusahaan' => 'Alamat Perusahaan',
            'alamat-email-aktif-atasan' => 'Alamat Email Aktif Atasan',
        ]);


        $dataAkhirKerja = [];

        // cek jika inputan tanggal akhir kerja ada dan mematikan is_active
        if (isset($rules['tanggal-akhir-kerja-kosongkan-jika-masih-bekerja'])) {
            $dataAkhirKerja = [
                'is_active' => 0,
                'tgl_akhir_kerja' => $rules['tanggal-akhir-kerja-kosongkan-jika-masih-bekerja'],
            ];
        }

        $dataPrepare = [
            'user_id' => Auth::user()->id,
            'status_pekerjaan' => $rules['status-pekerjaan'],
            'kriteria_pekerjaan' => $rules['kriteria-pekerjaan'],
            'bidang_pekerjaan' => $rules['bidang-pekerjaan'],
            'tingkat_tempat_bekerja' => $rules['tingkat-ukuran-tempat-bekerja'],
            'jabatan_pekerjaan' => $rules['posisi-jabatan-pekerjaan'],
            'detail_pekerjaan' => $rules['detail-pekerjaan'],
            'pendapatan' => $rules['jumlah-pendapatan-perbulan'],
            'kesesuaian' => $rules['kesesuaian-pekerjaan-dengan-prodi'],
            'tgl_mulai_kerja' => $rules['tanggal-mulai-bekerja'],
            'provinsi_kerja' => $rules['provinsi'],
            'kabupaten_kerja' => $rules['kabupaten'],
            'bukti_bekerja' => $request->file('fotobukti-telah-bekerja')->store('bukti-bekerja'),
        ] + $dataAkhirKerja;

        $pekerja = Pekerja::create($dataPrepare);

        // cek jika freelance dan early return 
        if ($rules['status-pekerjaan'] == 'b' && $rules['kriteria-pekerjaan'] == 'd') {
            return redirect('/dashboard/questioner')->with('success', 'Data pekerjaan berhasil ditambahkan!');
        }

        $token = null;
        // pembuatan token untuk link public yang diakses oleh stakeholder
        if(!isset($rules['tanggal-akhir-kerja-kosongkan-jika-masih-bekerja'])){
            do {
                $token = Str::random(255);
            } while (DetailPerusahaan::where('token', $token)->first());

            (new ApiIntegration)->whatsappGateway($rules['nomor-telepon-atasan'],
                "╔══*.·:·.✧ UINSU MEDAN ✧.·:·.*══╗\n\n\nUndangan untuk Mengisi Kuesioner Penilaian Kinerja Alumni\n\nHalo {$rules['posisi-jabatan-atasan']} {$rules['nama-perusahaan']},\n\nKami mengundang Anda untuk berpartisipasi dalam penilaian kinerja alumni kami. Kuesioner ini akan membantu kami memahami sejauh mana alumni kami telah mencapai tujuan perusahaan dan bagaimana mereka berkinerja dalam tugas-tugas yang diberikan.\n\nSilakan klik tautan di bawah ini untuk mengisi kuesioner:\n\nhttps://tracerstudy.uinsu.ac.id/questioner/{$token}\n\nKami sangat menghargai waktu dan masukan Anda. Terima kasih atas partisipasinya!\\n\\nSalam, Tim Tracer Study UINSU Medan\n\n\n╚═════*.·:·.✧ ✦ ✧ ✦ ✧.·:·.*═════╝",
            );
        }

        $detail_perusahaan = [
            'pekerja_id' => $pekerja->id,
            'nama_perusahaan' => $rules['nama-perusahaan'],
            'nama_atasan' => $rules['nama-atasan'],
            'jabatan_atasan' => $rules['posisi-jabatan-atasan'],
            'telepon_atasan' => $rules['nomor-telepon-atasan'],
            'alamat_perusahaan' => $rules['alamat-perusahaan'],
            'email_atasan' => $rules['alamat-email-aktif-atasan'],
            'token' => $token
        ];

        DetailPerusahaan::create($detail_perusahaan);

        if(Auth::user()->pekerja->count() > 1 || Auth::user()->wirausaha->count() > 1 ){
            return redirect('/dashboard/perjalanan-karir')->with('success', 'Data pekerjaan berhasil ditambahkan!');
        }
        
        return redirect('/dashboard/questioner')->with('success', 'Data pekerjaan berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pekerja $pekerja)
    {
        if ($pekerja->user_id != Auth::user()->id) {
            return abort(403);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pekerja $pekerja)
    {
        // allowing admin with same faculty to edit the resource
        if (
            ($pekerja->user_id != Auth::user()->id && Auth::user()->role == 'mahasiswa')
            ||
            (Auth::user()->fakultas != $pekerja->user->fakultas && Auth::user()->role == 'admin')
        ) {
            return abort(403);
        }

        return view('dashboard.mahasiswa.perjalanan-karir.kerja.editPekerja', [
            'pekerja' => $pekerja,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pekerja $pekerja)
    {
        // allowing admin with same faculty to edit the resource
        if (
            ($pekerja->user_id != Auth::user()->id && Auth::user()->role == 'mahasiswa')
            ||
            (Auth::user()->fakultas != $pekerja->user->fakultas && Auth::user()->role == 'admin')
        ) {
            return abort(403);
        }

        $rules = $request->validate([
            'bidang-pekerjaan' => 'required|string|in:a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u',
            'tingkat-ukuran-tempat-bekerja' => 'required|string|in:a,b,c',
            'posisi-jabatan-pekerjaan' => 'required|string|in:a,b,c,d,e,f',
            'detail-pekerjaan' => 'required|string|max:255',
            'jumlah-pendapatan-perbulan' => 'required|numeric',
            'kesesuaian-pekerjaan-dengan-prodi' => 'required|string|in:a,b,c',
            'tanggal-mulai-bekerja' => 'required|date',
            'tanggal-akhir-kerja' => 'nullable|date',
            'provinsi' => 'required|string|max:255',
            'kabupaten' => 'required|string|max:255',
            'fotobukti-telah-bekerja' => 'file|mimes:jpeg,png,jpg,gif,svg,pdf|max:2048',

            // info perusahaan
            'nama-perusahaan' => [Rule::requiredIf($pekerja->getRawOriginal('kriteria_pekerjaan') != 'd'), 'string', 'max:255'],
            'nama-atasan' => [Rule::requiredIf($pekerja->getRawOriginal('kriteria_pekerjaan') != 'd'), 'string', 'max:255'],
            'posisi-jabatan-atasan' => [Rule::requiredIf($pekerja->getRawOriginal('kriteria_pekerjaan') != 'd'), 'string', 'max:255'],
            'nomor-telepon-atasan' => [Rule::requiredIf($pekerja->getRawOriginal('kriteria_pekerjaan') != 'd'), 'string', 'max:255'],
            'alamat-perusahaan' => [Rule::requiredIf($pekerja->getRawOriginal('kriteria_pekerjaan') != 'd'), 'string', 'max:255'],
            'alamat-email-aktif-atasan' => [Rule::requiredIf($pekerja->getRawOriginal('kriteria_pekerjaan') != 'd'), 'email'],
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
            'bidang-pekerjaan' => 'Bidang Pekerjaan',
            'tingkat-ukuran-tempat-bekerja' => 'Tingkat Ukuran Tempat Bekerja',
            'posisi-jabatan-pekerjaan' => 'Posisi Jabatan Pekerjaan',
            'detail-pekerjaan' => 'Detail Pekerjaan',
            'jumlah-pendapatan-perbulan' => 'Jumlah Pendapatan Per Bulan',
            'kesesuaian-pekerjaan-dengan-prodi' => 'Kesesuaian Pekerjaan dengan Program Studi',
            'tanggal-mulai-bekerja' => 'Tanggal Mulai Bekerja',
            'tanggal-akhir-kerja' => 'Tanggal Akhir Bekerja',
            'provinsi' => 'Provinsi',
            'kabupaten' => 'Kabupaten',
            'fotobukti-telah-bekerja' => 'Foto Bukti Telah Bekerja',

            // info perusahaan
            'nama-perusahaan' => 'Nama Perusahaan',
            'nama-atasan' => 'Nama Atasan',
            'posisi-jabatan-atasan' => 'Posisi Jabatan Atasan',
            'nomor-telepon-atasan' => 'Nomor Telepon Atasan',
            'alamat-perusahaan' => 'Alamat Perusahaan',
            'alamat-email-aktif-atasan' => 'Alamat Email Aktif Atasan',
        ]);

        $dataAkhirKerja = [];
        if (isset($rules['tanggal-akhir-kerja'])) {
            $dataAkhirKerja = [
                'is_active' => 0,
                'tgl_akhir_kerja' => $rules['tanggal-akhir-kerja'],
            ];
        } else {
            $dataAkhirKerja = [
                'is_active' => 1,
                'tgl_akhir_kerja' => null,
            ];
        }

        $dataPrepare = [
            // 'user_id' => Auth::user()->id,
            'bidang_pekerjaan' => $rules['bidang-pekerjaan'],
            'tingkat_tempat_bekerja' => $rules['tingkat-ukuran-tempat-bekerja'],
            'jabatan_pekerjaan' => $rules['posisi-jabatan-pekerjaan'],
            'detail_pekerjaan' => $rules['detail-pekerjaan'],
            'pendapatan' => $rules['jumlah-pendapatan-perbulan'],
            'kesesuaian' => $rules['kesesuaian-pekerjaan-dengan-prodi'],
            'tgl_mulai_kerja' => $rules['tanggal-mulai-bekerja'],
            'provinsi_kerja' => $rules['provinsi'],
            'kabupaten_kerja' => $rules['kabupaten'],
        ] + $dataAkhirKerja;

        if (isset($rules['fotobukti-telah-bekerja'])) {
            Storage::delete($pekerja->bukti_bekerja);
            $dataPrepare['bukti_bekerja'] = $request->file('fotobukti-telah-bekerja')->store('bukti-bekerja');
        }

        $pekerja->update($dataPrepare);

        if ($pekerja->getRawOriginal('kriteria_pekerjaan') == 'd' && Auth::user()->role != 'mahasiswa') {
            return redirect('/dashboard/admin/' . $pekerja->user->id)->with('success', 'Data pekerjaan berhasil diubah!');
        }

        if ($pekerja->getRawOriginal('kriteria_pekerjaan') == 'd') {
            return redirect('/dashboard/perjalanan-karir')->with('success', 'Data pekerjaan berhasil diubah!');
        }

        $detail_perusahaan = [
            'pekerja_id' => $pekerja->id,
            'nama_perusahaan' => $rules['nama-perusahaan'],
            'nama_atasan' => $rules['nama-atasan'],
            'jabatan_atasan' => $rules['posisi-jabatan-atasan'],
            'telepon_atasan' => $rules['nomor-telepon-atasan'],
            'alamat_perusahaan' => $rules['alamat-perusahaan'],
            'email_atasan' => $rules['alamat-email-aktif-atasan'],
        ];

        // cek jika nomor telepon atasan berubah atau tidak untuk membuat token baru
        if ($rules['nomor-telepon-atasan'] != $pekerja->detailPerusahaan->telepon_atasan && !isset($rules['tanggal-akhir-kerja-kosongkan-jika-masih-bekerja'])) {
            do {
                $detail_perusahaan['token'] = Str::random(255);
            } while (DetailPerusahaan::where('token', $detail_perusahaan['token'])->first());

            (new ApiIntegration)->whatsappGateway($rules['nomor-telepon-atasan'],
                "╔══*.·:·.✧ UINSU MEDAN ✧.·:·.*══╗\n\n\nUndangan untuk Mengisi Kuesioner Penilaian Kinerja Alumni\n\nHalo {$rules['posisi-jabatan-atasan']} {$rules['nama-perusahaan']},\n\nKami mengundang Anda untuk berpartisipasi dalam penilaian kinerja alumni kami. Kuesioner ini akan membantu kami memahami sejauh mana alumni kami telah mencapai tujuan perusahaan dan bagaimana mereka berkinerja dalam tugas-tugas yang diberikan.\n\nSilakan klik tautan di bawah ini untuk mengisi kuesioner:\n\nhttps://tracerstudy.uinsu.ac.id/questioner/{$detail_perusahaan['token']}\n\nKami sangat menghargai waktu dan masukan Anda. Terima kasih atas partisipasinya!\\n\\nSalam, Tim Tracer Study UINSU Medan\n\n\n╚═════*.·:·.✧ ✦ ✧ ✦ ✧.·:·.*═════╝",
            );
        }

        DetailPerusahaan::where('pekerja_id', $pekerja->id)->update($detail_perusahaan);

        if (Auth::user()->role != 'mahasiswa') {
            return redirect('/dashboard/admin/' . $pekerja->user->id)->with('success', 'Data pekerjaan berhasil diubah!');
        }

        return redirect('/dashboard/perjalanan-karir')->with('success', 'Data pekerjaan berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pekerja $pekerja)
    {
        // allowing admin with same faculty to delete the resource
        if (
            ($pekerja->user_id != Auth::user()->id && Auth::user()->role == 'mahasiswa')
            ||
            (Auth::user()->fakultas != $pekerja->user->fakultas && Auth::user()->role == 'admin')
        ) {
            return abort(403);
        }

        if ($pekerja->bukti_bekerja) {
            Storage::delete($pekerja->bukti_bekerja);
        }
        $pekerja->delete();

        if (Auth::user()->role != 'mahasiswa') {
            return redirect('/dashboard/admin/' . $pekerja->user->id)->with('success', 'Data pekerjaan berhasil dihapus!');
        }

        return redirect('/dashboard/perjalanan-karir')->with('success', 'Berhasil menghapus data!');
    }

    private function whatsappGateway(){
        // TODO: Adding whatsapp gateway
    }
}