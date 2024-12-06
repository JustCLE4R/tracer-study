<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VisualisasiController extends Controller
{
    public function index()
    {
        // get all fakultas and prodi and then send to frontend
        $tahun = User::distinct()->pluck('tgl_wisuda')->map(function($date) {
            $year = date('Y', strtotime($date));
            return $year == 1970 ? null : $year;
        })->filter()->toArray();

        $fakultas = User::distinct()->pluck('fakultas')->filter(function($value) {
            return $value !== '-';
        })->toArray();
        
        $prodi = User::distinct()->pluck('program_studi')->filter(function($value) {
            return $value !== '-';
        })->toArray();

        $exportOptions = [
            'tahun' => $tahun,
            'fakultas' => $fakultas,
            'prodi' => $prodi
        ];

        return view('dashboard.super-admin.visual', [
            'exportOptions' => $exportOptions
        ]);
    }
}
