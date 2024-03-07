<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PerjalananController extends Controller
{

  public function index(){
    return view('dashboard.perjalanan');
  }

}
