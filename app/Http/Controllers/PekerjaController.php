<?php

namespace App\Http\Controllers;

use App\Models\Pekerja;
use Illuminate\Http\Request;

class PekerjaController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    return abort(404);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('dashboard.perjalanan-karir.kerja.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    dd($request->all());
  }

  /**
   * Display the specified resource.
   */
  public function show(Pekerja $pekerja)
  {
    if($pekerja->user_id != auth()->user()->id){
      return abort(403);
    }
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Pekerja $pekerja)
  {
    if($pekerja->user_id != auth()->user()->id){
      return abort(403);
    }
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Pekerja $pekerja)
  {
    if($pekerja->user_id != auth()->user()->id){
      return abort(403);
    }
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Pekerja $pekerja)
  {
    if($pekerja->user_id != auth()->user()->id){
      return abort(403);
    }
  }
}
