<?php

namespace App\Http\Controllers;

use App\Models\Career;
use Illuminate\Http\Request;

class LandingController extends Controller
{
  public function index()
  {
    return view('landing', [
      'careers' => Career::orderBy('created_at', 'desc')->take(4)->get(),

    ]);
  }
}
