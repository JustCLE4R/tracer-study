<?php

namespace App\Http\Controllers;

use App\Models\Pekerja;
use App\Models\Pendidikan;
use Illuminate\Http\Request;

class PerjalananKarirController extends Controller
{
	public function index(){
		return view('dashboard.perjalanan-karir.index', [
			'pekerjaans' => Pekerja::where('user_id', auth()->user()->id)->orderBy('tgl_mulai_kerja', 'asc')->get(),
			'pendidikans' => Pendidikan::where('user_id', auth()->user()->id)->orderBy('tingkat_pendidikan', 'asc')->get()
		]);
	}
}
