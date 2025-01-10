<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Models\CertCheck;
use App\Models\Questioner;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreQuestionerRequest;

class QuestionerController extends Controller
{
    public function index(){
        // return view('dashboard.questioner.notperiod');

        if (CertCheck::where('user_id', Auth::user()->id)->firstOrCreate(['user_id' => Auth::user()->id])->profile_check == false) {
			return redirect('/dashboard/profile')->with('warning', 'Lengkapi profil terlebih dahulu!');
		}

        if (CertCheck::where('user_id', Auth::user()->id)->firstOrCreate(['user_id' => Auth::user()->id])->perjalanan_karir_check == false) {
			return redirect('/dashboard/perjalanan-karir')->with('warning', 'Lengkapi perjalanan karir terlebih dahulu!');
		}

        return view('dashboard.mahasiswa.questioner.index', [
            'questioner' => Questioner::where('user_id', Auth::user()->id)->with('user')->get(),
        ]);
    }

    public function store(StoreQuestionerRequest $request){
        Questioner::create($request->validated());

        CertCheck::updateOrCreate([
            'user_id' => Auth::user()->id
        ], [
            'questioner_check' => true
        ]);

        return redirect('/dashboard/sertifikat')->with('success', 'Questioner berhasil ditambahkan');
    }
}
