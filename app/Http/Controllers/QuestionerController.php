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
            return strpos($key, 'b_') === 0;
        }, ARRAY_FILTER_USE_KEY);

        $data = array_diff_key($data, $b_data);

        $data['detail_perusahaan_id'] = $questioner->id;

        $data['c_1'] = json_encode($data['c_1']);
        $data['d_1'] = json_encode($data['d_1']);
        
        QuestionerStackHolder::create($data);
        
        $fields = [
            'b_1' => 'nama_perusahaan',
            'b_2' => 'nama_atasan',
            'b_3' => 'jabatan_atasan',
            'b_4' => 'telepon_atasan',
            'b_5' => 'alamat_perusahaan',
            'b_6' => 'email_atasan',
        ];

        foreach ($fields as $key => $property) {
            if ($b_data[$key] != $questioner->$property) {
                $questioner->update([
                    'nama_perusahaan' => $b_data['b_1'],
                    'nama_atasan' => $b_data['b_2'],
                    'jabatan_atasan' => $b_data['b_3'],
                    'telepon_atasan' => $b_data['b_4'],
                    'alamat_perusahaan' => $b_data['b_5'],
                    'email_atasan' => $b_data['b_6'],
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
        $data = Questioner::get()->first();
        return view('dashboard.questioner.index', [
            'questioner' => Questioner::where('user_id', auth()->user()->id)->with('user')->get(),
            'data' => $data
        ]);
    }

    public function store(StoreQuestionerRequest $request){
        Questioner::create($request->validated());

        return redirect('/dashboard/questioner')->with('success', 'Questioner has been created');
    }
}
