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
        $data = Questioner::get()->first();
        return view('dashboard.questioner.index', [
            'questioner' => Questioner::where('user_id', Auth::user()->id)->with('user')->get(),
            'data' => $data
        ]);
    }

    public function store(StoreQuestionerRequest $request){
        Questioner::create($request->validated());

        CertCheck::updateOrCreate([
            'user_id' => Auth::user()->id
        ], [
            'questioner_check' => true
        ]);

        return redirect('/dashboard/questioner')->with('success', 'Questioner has been created');
    }
}
