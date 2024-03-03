<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class TracerController extends Controller
{

  public function index(){
    return view('dashboard.tracer');
  }

  public function getQuestions(){
    return response()->json([
      'questions' => Question::all()
    ]);
  }

  public function getQuestionByCategory(Question $question){
    return response()->json([
      'questions' => $question->where('category', $question->category)->get()
    ]);
  }

  public function getQuestionByType(Question $question){
    return response()->json([
      'questions' => $question->where('type', $question->type)->get()
    ]);
  }

  public function receviceAnswer(Request $request){
    return response()->json([
      $request->all()
    ]);
  }
}
