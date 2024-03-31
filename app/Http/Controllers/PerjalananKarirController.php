<?php

namespace App\Http\Controllers;

use App\Models\Pekerja;
use App\Models\Wirausaha;
use App\Models\Pendidikan;
use Illuminate\Support\Facades\DB;

class PerjalananKarirController extends Controller
{
	public function index(){
		$user_id = auth()->user()->id;

		$pekerjaans = Pekerja::select(DB::raw("'pekerja' as tipe_kerja"), 'id', 'jabatan_pekerjaan', 'detail_pekerjaan', 'is_bekerja', 'tgl_mulai_kerja as tanggal_mulai', 'tgl_akhir_kerja as tanggal_akhir')
				->where('user_id', $user_id);

		$wirausaha = Wirausaha::select(DB::raw("'wirausaha' as tipe_kerja"), 'id', 'jabatan_usaha', 'nama_usaha', DB::raw(1), 'tgl_mulai_usaha as tanggal_mulai', 'tgl_akhir_usaha as tanggal_akhir')
				->where('user_id', $user_id);

		$unioned = $pekerjaans->union($wirausaha)->orderBy('tanggal_mulai', 'asc')->get();

		// dd($unioned);

		return view('dashboard.perjalanan-karir.index', [
			'pekerjaans' => $unioned,
			'pendidikans' => Pendidikan::where('user_id', auth()->user()->id)->orderBy('tingkat_pendidikan', 'asc')->get()
		]);
	}
}
