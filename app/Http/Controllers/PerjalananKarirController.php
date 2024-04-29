<?php

namespace App\Http\Controllers;

use App\Models\User;
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

		$unioned = $pekerjaans->union($wirausaha)->orderBy('is_active', 'desc')->orderBy('tanggal_mulai', 'asc')->get();

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
				return (new PekerjaController)->store($request);
				break;
			case 'wirausaha':
				return (new WirausahaController)->store($request);
				break;
			case 'belum-kerja':
				return $this->nganggurStore($request);
				break;
			default:
				return abort(404);
				break;
    }
	}

	private static function nganggurStore($request){
    $request->validate([
      'saya-belum-memiliki-pekerjaan' => 'required|array|size:1'
    ], [
      'required' => 'Centang pernyataan :attribute',
    ], [
      'saya-belum-memiliki-pekerjaan' => '"Ya, saya belum bekerja"'
    ]);

		$user = User::find(auth()->user()->id);

		$user->update([
			'is_bekerja' => 0
		]);

    return redirect('/dashboard/perjalanan-karir')->with('success', 'Data tidak bekerja telah ditambahkan!');
  }
	
}
