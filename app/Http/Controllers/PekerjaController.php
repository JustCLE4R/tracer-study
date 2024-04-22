<?php

namespace App\Http\Controllers;

use App\Models\Pekerja;
use App\Models\Wirausaha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
    return abort(404);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store($request)
  {
    return $request->pekerjaan == 'pekerja' ? Pekerja::pekerjaStore($request) : Pekerja::nganggurStore($request);
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

    if ($pekerja->bukti_bekerja) {
      Storage::delete($pekerja->bukti_bekerja);
    }
    $pekerja->delete();
    
    return redirect('/dashboard/perjalanan-karir')->with('success', 'Berhasil menghapus data!');
  }
}
