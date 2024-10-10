<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Career;
use App\Models\Laporan;

class LandingController extends Controller
{
  public function index()
  {
    $mhsCount = User::where('role', 'mahasiswa')->count(); 

    $avgMhsIpk = User::where('role', 'mahasiswa')->avg('ipk');

    return view('landing', [
      'avgMhsIpk' => $avgMhsIpk,
      'mhsCount' => $mhsCount,
      'careers' => Career::orderBy('created_at', 'desc')->take(4)->get(),
      'laporans' => Laporan::orderBy('created_at', 'desc')->get(),
    ]);
  }
}
