<?php

namespace App\Http\Controllers;

use App\Models\Pekerja;
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
    return Pekerja::pekerjaStore($request);
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
    // allowing admin with same faculty to edit the resource
    if(
      ($pekerja->user_id != auth()->user()->id && auth()->user()->role == 'mahasiswa')
      || 
      (auth()->user()->fakultas != $pekerja->user->fakultas && auth()->user()->role == 'admin')
    )
    {
      return abort(403);
    }

    return view('dashboard.perjalanan-karir.kerja.editPekerja', [
      'pekerja' => $pekerja,
    ]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Pekerja $pekerja)
  {
    // allowing admin with same faculty to edit the resource
    if(
      ($pekerja->user_id != auth()->user()->id && auth()->user()->role == 'mahasiswa')
      || 
      (auth()->user()->fakultas != $pekerja->user->fakultas && auth()->user()->role == 'admin')
    )
    {
      return abort(403);
    }

    return Pekerja::pekerjaUpdate($request, $pekerja);
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Pekerja $pekerja)
  {
    // allowing admin with same faculty to delete the resource
    if(
      ($pekerja->user_id != auth()->user()->id && auth()->user()->role == 'mahasiswa')
      || 
      (auth()->user()->fakultas != $pekerja->user->fakultas && auth()->user()->role == 'admin')
    )
    {
      return abort(403);
    }

    if ($pekerja->bukti_bekerja) {
      Storage::delete($pekerja->bukti_bekerja);
    }
    $pekerja->delete();

    if(auth()->user()->role != 'mahasiswa'){
      return redirect('/dashboard/admin/'.$pekerja->user->id)->with('success', 'Data pekerjaan berhasil dihapus!');
    }
    
    return redirect('/dashboard/perjalanan-karir')->with('success', 'Berhasil menghapus data!');
  }
}
