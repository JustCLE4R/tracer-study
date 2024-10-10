<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $dataPengisi = DB::table('users')
            ->select(DB::raw('count(*) as total_pengisi, tahun_masuk'))
            ->where('role', 'mahasiswa')
            ->groupBy('tahun_masuk')
            ->get();

        return view('dashboard.index',[
            'dataPengisi' => $dataPengisi,
        ]);
    }
}
