<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreQuestionerRequest;
use App\Http\Requests\StoreQuestionerStackHolderRequest;
use App\Models\DetailPerusahaan;
use App\Models\Questioner;
use App\Models\QuestionerStackHolder;
use Illuminate\Http\Request;

class QuestionerController extends Controller
{
    public function getPublicQuestioner(DetailPerusahaan $questioner){
        if (!$questioner->exists) {
            abort(404);
        }

        return view('dashboard.questioner.stack', [
            'questioner' => $questioner
        ]);
    }

    public function postPublicQuestioner(StoreQuestionerStackHolderRequest $request, DetailPerusahaan $questioner){
        if (!$questioner->exists) {
            abort(404);
        }
        
        $data = $request->validated();

        $b_data = array_filter($data, function($key) {
            return strpos($key, 'b-') === 0;
        }, ARRAY_FILTER_USE_KEY);

        $data = array_diff_key($data, $b_data);

        $data['detail_perusahaan_id'] = $questioner->id;

        $data['c-1'] = json_encode($data['c-1']);
        $data['d-1'] = json_encode($data['d-1']);
        
        QuestionerStackHolder::create($data);
        
        $fields = [
            'b-1' => 'nama_perusahaan',
            'b-2' => 'nama_atasan',
            'b-3' => 'jabatan_atasan',
            'b-4' => 'telepon_atasan',
            'b-5' => 'alamat_perusahaan',
            'b-6' => 'email_atasan',
        ];

        foreach ($fields as $key => $property) {
            if ($b_data[$key] != $questioner->$property) {
                $questioner->update([
                    'nama_perusahaan' => $b_data['b-1'],
                    'nama_atasan' => $b_data['b-2'],
                    'jabatan_atasan' => $b_data['b-3'],
                    'telepon_atasan' => $b_data['b-4'],
                    'alamat_perusahaan' => $b_data['b-5'],
                    'email_atasan' => $b_data['b-6'],
                ]);
                break;
            }
        }
        
        $questioner->update([
            'token' => null,
        ]);

        return view('dashboard.questioner.gratitude');
    }

    public function index(){
        return view('dashboard.questioner.index', [
            'questioner' => Questioner::where('user_id', auth()->user()->id)->with('user')->get()
        ]);
    }

    public function store(StoreQuestionerRequest $request){
        Questioner::create($request->validated());

        return redirect('/dashboard/questioner')->with('success', 'Questioner has been created');
    }
}
