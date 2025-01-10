<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Models\User;
use App\Models\Pekerja;
use App\Models\CertCheck;
use App\Models\Wirausaha;
use App\Models\Pendidikan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Mahasiswa\PekerjaController;
use App\Http\Controllers\Mahasiswa\WirausahaController;

class PerjalananKarirController extends Controller
{
	public function index(){
		if (CertCheck::where('user_id', Auth::user()->id)->firstOrCreate(['user_id' => Auth::user()->id])->profile_check == false) {
			return redirect('/dashboard/profile')->with('warning', 'Lengkapi profil terlebih dahulu!');
		}

		$user_id = Auth::user()->id;

		$pekerjaans = Pekerja::select(DB::raw("'pekerja' as tipe_kerja"), 'pekerjas.id', 'jabatan_pekerjaan', 'detail_pekerjaan', 'is_active', 'tgl_mulai_kerja as tanggal_mulai', 'tgl_akhir_kerja as tanggal_akhir', 'detail_perusahaans.token')
				->leftJoin('detail_perusahaans', 'detail_perusahaans.pekerja_id', '=', 'pekerjas.id')
				->where('pekerjas.user_id', $user_id);

		$wirausaha = Wirausaha::select(DB::raw("'wirausaha' as tipe_kerja"), 'id', DB::raw("'a'"), 'nama_usaha', 'is_active', 'tgl_mulai_usaha as tanggal_mulai', 'tgl_akhir_usaha as tanggal_akhir', DB::raw("null"))
				->where('user_id', $user_id);

		$unioned = $pekerjaans->union($wirausaha)->orderBy('is_active', 'desc')->orderBy('tanggal_mulai', 'asc')->orderBy('tipe_kerja', 'desc')->get();

		return view('dashboard.mahasiswa.perjalanan-karir.index', [
			'pekerjaans' => $unioned,
			'pendidikans' => Pendidikan::where('user_id', Auth::user()->id)->orderBy('tingkat_pendidikan', 'asc')->get()
		]);
	}

	public function create(){
		if (CertCheck::where('user_id', Auth::user()->id)->firstOrCreate(['user_id' => Auth::user()->id])->profile_check == false) {
			return redirect('/dashboard/profile')->with('warning', 'Lengkapi profil terlebih dahulu!');
		}

    return view('dashboard.mahasiswa.perjalanan-karir.create');
	}

	public function store(Request $request){
		if (CertCheck::where('user_id', Auth::user()->id)->firstOrCreate(['user_id' => Auth::user()->id])->profile_check == false) {
			return redirect('/dashboard/profile')->with('warning', 'Lengkapi profil terlebih dahulu!');
		}

		CertCheck::updateOrCreate([
			'user_id' => Auth::user()->id
		], [
			'perjalanan_karir_check' => true
		]);

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

	public function destroyBelumKerja(){
		$user = User::find(Auth::user()->id);

		$user->update([
			'is_bekerja' => 1
		]);

		return redirect('/dashboard/perjalanan-karir')->with('success', 'Data belum bekerja telah dihapus!');
	}

	private static function nganggurStore($request){
		$request->validate([
			'saya-belum-memiliki-pekerjaan' => 'required|array|size:1'
		], [
			'required' => 'Centang pernyataan :attribute',
		], [
			'saya-belum-memiliki-pekerjaan' => '"Ya, saya belum bekerja"'
		]);

			$user = User::find(Auth::user()->id);

			$user->update([
				'is_bekerja' => 0
			]);

		return redirect('/dashboard/questioner')->with('success', 'Data belum bekerja telah ditambahkan!');
	}
	
}
