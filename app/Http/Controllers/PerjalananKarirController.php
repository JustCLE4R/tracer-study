<?php

namespace App\Http\Controllers;

use App\Models\Pekerja;
use App\Models\Wirausaha;
use App\Models\Pendidikan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\PekerjaController;
use App\Http\Controllers\WirausahaController;

class PerjalananKarirController extends Controller
{
	public function index(){
		$user_id = auth()->user()->id;

		$pekerjaans = Pekerja::select(DB::raw("'pekerja' as tipe_kerja"), 'id', 'jabatan_pekerjaan', 'detail_pekerjaan', 'is_active', 'tgl_mulai_kerja as tanggal_mulai', 'tgl_akhir_kerja as tanggal_akhir')
				->where('user_id', $user_id);

		$wirausaha = Wirausaha::select(DB::raw("'wirausaha' as tipe_kerja"), 'id', DB::raw('1'), 'nama_usaha', 'is_active', 'tgl_mulai_usaha as tanggal_mulai', 'tgl_akhir_usaha as tanggal_akhir')
				->where('user_id', $user_id);

		$unioned = $pekerjaans->union($wirausaha)->orderBy('tanggal_mulai', 'asc')->get();

		dd($unioned);

		return view('dashboard.perjalanan-karir.index', [
			'pekerjaans' => $unioned,
			'pendidikans' => Pendidikan::where('user_id', auth()->user()->id)->orderBy('tingkat_pendidikan', 'asc')->get()
		]);
	}

	public function create(){
    return view('dashboard.perjalanan-karir.create');
	}

	public function store(Request $request){
		switch ($request->pekerjaan){
			case 'pekerja':
			case 'belum-kerja':
				return (new PekerjaController)->store($request);
				break;
      case 'wirausaha':
        return (new WirausahaController)->store($request);
        break;
    }
	}

	
}
