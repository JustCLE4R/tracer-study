<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class VisualisasiController extends Controller
{
    public function index()
    {
        // get all fakultas and prodi and then send to frontend
        $tahun = User::distinct()->pluck('tgl_wisuda')->map(function($date) {
            return date('Y', strtotime($date));
        })->toArray();
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

        return view('dashboard.visual', [
            'exportOptions' => $exportOptions
        ]);
    }
}
