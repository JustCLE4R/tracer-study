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
