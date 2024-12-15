<?php

namespace App\Http\Controllers;

use App\Exports\MhsQuestionerExport;
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

        $exportClasses = [
            'pekerja' => PekerjaExport::class,
            'wirausaha' => WirausahaExport::class,
            'pendidikan' => PendidikanExport::class,
            'questioner' => MhsQuestionerExport::class,
        ];

        if (!isset($exportClasses[$jenisVisualisasi])) {
            abort(404, 'Export type not found');
        }

        $export = new $exportClasses[$jenisVisualisasi]($tahun, $fakultas, $programStudi);

        return Excel::download($export, $this->generateFilename($tahun, $fakultas, $programStudi, $jenisVisualisasi));
    }

    private function generateFilename($tahun, $fakultas, $programStudi, $jenisVisualisasi)
    {
        return sprintf('%s-%s-%s-%s-%s.xlsx', $tahun ?: 'all', $fakultas ?: 'all', $programStudi ?: 'all', $jenisVisualisasi, time());
    }
}