<?php

namespace App\Http\Controllers\Api;

use App\Models\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuestionController extends Controller
{
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
}