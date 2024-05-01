<?php

namespace App\Http\Controllers;

use App\Models\Wirausaha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WirausahaController extends Controller
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
    return Wirausaha::wirausahaStore($request);
  }

  /**
   * Display the specified resource.
   */
  public function show(Wirausaha $wirausaha)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Wirausaha $wirausaha)
  {
    if($wirausaha->user_id != auth()->user()->id){
      return abort(403);
    }

    return view('dashboard.perjalanan-karir.kerja.editWirausaha', [
      'wirausaha' => $wirausaha
    ]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Wirausaha $wirausaha)
  {
    dd($request->all());
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Wirausaha $wirausaha)
  {
    if ($wirausaha->user_id != auth()->user()->id) {
      return abort(403);
    }

    if ($wirausaha->bukti_berusaha) {
      Storage::delete($wirausaha->bukti_berusaha);
    }
    $wirausaha->delete();

    return redirect('/dashboard/perjalanan-karir')->with('success', 'Berhasil menghapus data!');
  }
}
