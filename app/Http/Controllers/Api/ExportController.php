<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\QuestionerStakeHolder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ExportController extends Controller
{
    public function export(Request $request)
    {
        // Validate the request inputs
        $validator = Validator::make($request->all(), [
            'program_studi' => 'nullable|string',
            'fakultas' => 'nullable|string',
            'jenisVisualisasi' => 'required|string|in:wirausaha,pekerja,pendidikan,questioner,questioner_stake_holders',
            'tahun' => 'nullable|integer|min:1900|max:' . date('Y'),
        ], [
            'jenisVisualisasi.required' => 'Jenis Visualisasi is required and must be one of: wirausaha, pekerja, pendidikan, questioner, questioner_stake_holders.',
            'tahun.integer' => 'Tahun must be a valid year.',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json([
                'status' => 'failed',
                'errors' => $validator->errors(),
            ], 422);
        }

        // Extract validated data
        $validated = $validator->validated();
        $tahun = $validated['tahun'] ?? null;
        $fakultas = $validated['fakultas'] ?? null;
        $program_studi = $validated['program_studi'] ?? null;
        $jenisVisualisasi = $validated['jenisVisualisasi'];

        // Fetch data for export
        $exportData = $this->fetchExportData($jenisVisualisasi, $tahun, $fakultas, $program_studi);

        // Check if data exists
        if ($exportData->isEmpty()) {
            return response()->json([
                'status' => "failed",
                'message' => 'No data found for the given filters.',
            ]);
        }

        // Generate filename and file path
        $filename = $this->generateFilename($tahun, $fakultas, $program_studi, $jenisVisualisasi);
        $filepath = "exports/{$filename}";

        // Write CSV and prepare for download
        $headers = $this->getCsvHeaders($exportData);
        $this->writeCsvFile($filepath, $headers, $exportData);

        // Return the file for download
        return response()->download(Storage::path($filepath))->deleteFileAfterSend(true);
    }

    private function fetchExportData($jenisVisualisasi, $tahun, $fakultas, $program_studi)
    {
        if (in_array($jenisVisualisasi, ['wirausaha', 'pekerja', 'pendidikan', 'questioner'])) {
            return User::with($jenisVisualisasi)
                ->when($tahun, fn($query) => $query->whereYear('tgl_wisuda', $tahun))
                ->when($program_studi, fn($query) => $query->where('program_studi', $program_studi))
                ->when($fakultas, fn($query) => $query->where('fakultas', $fakultas))
                ->whereHas($jenisVisualisasi)
                ->get();
        }

        return QuestionerStakeHolder::join('detail_perusahaans', 'questioner_stake_holders.detail_perusahaan_id', '=', 'detail_perusahaans.id')
            ->join('pekerjas', 'detail_perusahaans.pekerja_id', '=', 'pekerjas.id')
            ->join('users', 'pekerjas.user_id', '=', 'users.id')
            ->when($tahun, fn($query) => $query->whereYear('users.tgl_wisuda', $tahun))
            ->when($program_studi, fn($query) => $query->where('users.program_studi', $program_studi))
            ->when(!$program_studi && $fakultas, fn($query) => $query->where('users.fakultas', $fakultas))
            ->select([
                'users.nim', 'users.nama', 'users.role', 'users.is_bekerja', 'users.program_studi', 'users.fakultas',
                'users.strata', 'users.tahun_masuk', 'users.tgl_wisuda', 'users.tgl_yudisium', 'users.ipk',
                'users.sks_kumulatif', 'users.predikat_kelulusan', 'users.judul_tugas_akhir', 'users.tempat_lahir',
                'users.tgl_lahir', 'users.jenis_kelamin', 'users.kewarganegaraan', 'users.provinsi', 'users.kabupaten',
                'users.kecamatan', 'users.alamat', 'users.telepon', 'users.email', 'users.linkedin', 'users.facebook',
                'questioner_stake_holders.*'
            ])
            ->get();
    }

    private function generateFilename($tahun, $fakultas, $program_studi, $jenisVisualisasi)
    {
        return sprintf('%s-%s-%s-%s-%s.csv', $tahun ?: 'all', $fakultas ?: 'all', $program_studi ?: 'all', $jenisVisualisasi, time());
    }

    private function getCsvHeaders($data)
    {
        $firstRow = $data->first()->toArray();
        return array_filter(array_keys($this->flattenArray($firstRow)), function ($key) {
            return !preg_match('/_id$/', $key) && !preg_match('/_at$/', $key);
        });
    }

    private function writeCsvFile($filepath, $headers, $data)
    {
        if (!Storage::exists($filepath)) {
            Storage::put($filepath, '');
        }
        $handle = fopen(Storage::path($filepath), 'w+');

        fputcsv($handle, $headers);

        foreach ($data as $row) {
            $flattenedRow = array_filter($this->flattenArray($row->toArray()), function ($key) {
                return !preg_match('/_id$/', $key) && !preg_match('/_at$/', $key);
            }, ARRAY_FILTER_USE_KEY);

            fputcsv($handle, $flattenedRow);
        }

        fclose($handle);
    }

    private function flattenArray(array $array, $prefix = '')
    {
        $result = [];

        foreach ($array as $key => $value) {
            $fullKey = $prefix ? $prefix . '.' . $key : $key;

            if (is_array($value)) {
                $result = array_merge($result, $this->flattenArray($value, $fullKey));
            } else {
                $result[$fullKey] = $value;
            }
        }

        return $result;
    }
}