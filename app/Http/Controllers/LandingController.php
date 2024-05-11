<?php

namespace App\Http\Controllers;

use App\Models\Career;
use App\Models\Laporan;
use Illuminate\Http\Request;

class LandingController extends Controller
{
  public function index()
  {
    return view('landing', [
      'careers' => Career::orderBy('created_at', 'desc')->take(4)->get(),
      'laporans' => Laporan::orderBy('created_at', 'desc')->get(),
    ]);
  }
}
