<?php

namespace App\Http\Controllers;

use App\Models\DetailPerusahaan;
use Illuminate\Http\Request;

class QuestionerController extends Controller
{
    public function getPublicQuestioner(DetailPerusahaan $questioner){
        if (!$questioner->exists) {
            abort(404);
        }

        return("hallo " . $questioner. "<br><br>" . $questioner->pekerja);
    }
}
