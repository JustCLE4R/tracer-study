<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePekerjaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'pekerjaan' => 'required|string',
            // 'status-pekerjaan' => 'required|string',
            // 'kriteria-pekerjaan' => 'required|string|in:a,b,c,d',
            // 'bidang-pekerjaan' => 'required|string|in:a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u',
            // 'tingkat-ukuran-tempat-bekerja' => 'required|string|in:a,b,c',
            // 'posisi-jabatan-pekerjaan' => 'required|string|in:a,b,c,d,e,f',
            // 'detail-pekerjaan' => 'required|string',
            // 'jumlah-pendapatan-perbulan' => 'required|numeric',
            // 'kesesuaian-pekerjaan-dengan-prodi' => 'required|string|in:a,b,c',
            // 'tanggal-mulai-bekerja' => 'required|date',
            // 'tanggal-akhir-kerja-kosongkan-jika-masih-bekerja' => 'nullable|date',
            // 'provinsi' => 'required|string',
            // 'kabupaten' => 'required|string',
            // 'fotobukti-telah-bekerja' => 'required|file|mimes:jpeg,png,jpg,gif,svg,pdf|max:2048',

            // info perusahaan
            // 'nama_perusahaan' => 'required_unless:kriteria_pekerjaan,!=,d|string|max:255',
            // 'nama_atasan' => 'required_unless:kriteria_pekerjaan,!=,d|string|max:255',
            // 'jabatan_atasan' => 'required_unless:kriteria_pekerjaan,!=,d|string|max:255',
            // 'telepon_atasan' => 'required_unless:kriteria_pekerjaan,!=,d|string|max:255',
            // 'alamat_perusahaan' => 'required_unless:kriteria_pekerjaan,!=,d|string|max:255',
            // 'email_atasan' => 'required_unless:kriteria_pekerjaan,!=,d|email',
        ];
    }

    public function messages(): array
    {
        return [
            'required' => 'Kolom :attribute wajib diisi.',
            'string' => 'Kolom :attribute harus berupa teks.',
            'in' => 'Kolom :attribute tidak valid.',
            'numeric' => 'Kolom :attribute harus berupa angka.',
            'email' => 'Kolom :attribute harus berupa alamat email yang valid.',
            'date' => 'Kolom :attribute harus berupa tanggal yang valid.',
            'image' => 'Kolom :attribute harus berupa gambar.',
            'mimes' => 'Kolom :attribute harus memiliki format: :values.',
            'max' => 'Kolom :attribute tidak boleh lebih dari :max',
        ];
    }

    public function attributes(): array
    {
        return [
            // 'pekerjaan' => 'Pekerjaan',
            // 'status_pekerjaan' => 'Status Pekerjaan',
            // 'kriteria_pekerjaan' => 'Kriteria Pekerjaan',
            // 'bidang_pekerjaan' => 'Bidang Pekerjaan',
            // 'tingkat_tempat_bekerja' => 'Tingkat Ukuran Tempat Bekerja',
            // 'jabatan_pekerjaan' => 'Posisi Jabatan Pekerjaan',
            // 'detail_pekerjaan' => 'Detail Pekerjaan',
            // 'pendapatan' => 'Jumlah Pendapatan Per Bulan',
            // 'kesesuaian' => 'Kesesuaian Pekerjaan dengan Program Studi',
            // 'tgl_mulai_kerja' => 'Tanggal Mulai Bekerja',
            // 'tgl_akhir_kerja' => 'Tanggal Akhir Bekerja',
            // 'provinsi_kerja' => 'Provinsi',
            // 'kabupaten_kerja' => 'Kabupaten',
            // 'bukti_bekerja' => 'Foto Bukti Telah Bekerja',

            // info perusahaan
            // 'nama_perusahaan' => 'Nama Perusahaan',
            // 'nama_atasan' => 'Nama Atasan',
            // 'jabatan_atasan' => 'Posisi Jabatan Atasan',
            // 'telepon_atasan' => 'Nomor Telepon Atasan',
            // 'alamat_perusahaan' => 'Alamat Perusahaan',
            // 'email_atasan' => 'Alamat Email Aktif Atasan',
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            // 'pekerjaan' => $this->input('pekerjaan'),
            // 'status_pekerjaan' => $this->input('status-pekerjaan'),
            // 'kriteria_pekerjaan' => $this->input('kriteria-pekerjaan'),
            // 'bidang_pekerjaan' => $this->input('bidang-pekerjaan'),
            // 'tingkat_tempat_bekerja' => $this->input('tingkat-ukuran-tempat-bekerja'),
            // 'jabatan_pekerjaan' => $this->input('posisi-jabatan-pekerjaan'),
            // 'detail_pekerjaan' => $this->input('detail-pekerjaan'),
            // 'pendapatan' => $this->input('jumlah-pendapatan-perbulan'),
            // 'kesesuaian' => $this->input('kesesuaian-pekerjaan-dengan-prodi'),
            // 'tgl_mulai_kerja' => $this->input('tanggal-mulai-bekerja'),
            // 'tgl_akhir_kerja' => $this->input('tanggal-akhir-kerja-kosongkan-jika-masih-bekerja'),
            // 'provinsi_kerja' => $this->input('provinsi'),
            // 'kabupaten_kerja' => $this->input('kabupaten'),
            // 'bukti_bekerja' => $this->file('fotobukti-telah-bekerja'),

            // info perusahaan
            // 'nama_perusahaan' => $this->input('nama-perusahaan'),
            // 'nama_atasan' => $this->input('nama-atasan'),
            // 'jabatan_atasan' => $this->input('posisi-jabatan-atasan'),
            // 'telepon_atasan' => $this->input('nomor-telepon-atasan'),
            // 'alamat_perusahaan' => $this->input('alamat-perusahaan'),
            // 'email_atasan' => $this->input('alamat-email-aktif-atasan'),
        ]);
    }
}
