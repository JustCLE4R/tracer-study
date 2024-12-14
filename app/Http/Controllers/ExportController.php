<?php

namespace App\Http\Controllers;

use App\Exports\PekerjaExport;
use App\Exports\WirausahaExport;
use App\Exports\PendidikanExport;
use App\Http\Requests\ExportRequest;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function export(ExportRequest $request)
    {
        $tahun = $request->input('tahun');
        $fakultas = $request->input('fakultas');
        $programStudi = $request->input('program_studi');
        $jenisVisualisasi = $request->input('jenisVisualisasi');

        if ($jenisVisualisasi === 'pekerja') {
            $export = new PekerjaExport($tahun, $fakultas, $programStudi);
        }

        if ($jenisVisualisasi === 'wirausaha') {
            $export = new WirausahaExport($tahun, $fakultas, $programStudi);
        }

        if ($jenisVisualisasi === 'pendidikan') {
            $export = new PendidikanExport($tahun, $fakultas, $programStudi);
        }

        return Excel::download($export, $this->generateFilename($tahun, $fakultas, $programStudi, $jenisVisualisasi));
    }

    private function generateFilename($tahun, $fakultas, $programStudi, $jenisVisualisasi)
    {
        return sprintf('%s-%s-%s-%s-%s.xlsx', $tahun ?: 'all', $fakultas ?: 'all', $programStudi ?: 'all', $jenisVisualisasi, time());
    }
}