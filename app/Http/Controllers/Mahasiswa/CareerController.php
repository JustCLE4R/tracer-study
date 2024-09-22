<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Models\Career;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;

class CareerController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $query = Career::with('user')->latest();

    if (Auth::user()->role == 'admin') {
      $query->whereHas('user', function ($query) {
        $query->where('fakultas', Auth::user()->fakultas);
      });
    } else if (Auth::user()->role == 'superadmin') {
      //
    } else {
      $query->where('user_id', Auth::user()->id);
    }

    return view('dashboard.careers.index', [
      'careers' => $query->paginate()->appends(request()->query()),
    ]);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('dashboard.careers.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $validatedData = $request->validate([
      'company_name' => 'required',
      'category' => 'required|in:1,2,3,4',
      'position' => 'required',
      'url' => 'url|nullable',
      'slug' => 'required|unique:careers',
      'description' => 'required',
      'image' => 'image|file|max:2048',
    ], [
      'required' => 'Kolom :attribute wajib diisi.',
      'in' => 'Pilihan :attribute tidak valid.',
      'url' => 'Kolom :attribute harus berupa URL yang valid.',
      'unique' => 'Kolom :attribute sudah ada yang menggunakan.',
      'image' => 'Kolom :attribute harus berupa gambar.',
      'file' => 'Kolom :attribute harus berupa berkas.',
      'max' => 'Kolom :attribute tidak boleh lebih dari :max kilobita.',
    ], [
      'company_name' => 'Nama Perusahaan',
      'category' => 'Kategori',
      'position' => 'Posisi',
      'url' => 'URL',
      'slug' => 'Slug',
      'description' => 'Deskripsi',
      'image' => 'Gambar',
    ]);

    if ($request->file('image')) {
      $validatedData['image'] = $request->file('image')->store('careers-images');
    }

    $validatedData['user_id'] = Auth::user()->id;
    $validatedData['excerpt'] = Str::limit(strip_tags($validatedData['description']), 100);

    Career::create($validatedData);

    return redirect('/dashboard/career')->with('success', 'New career has been added!');
  }

  /**
   * Display the specified resource.
   */
  public function show(Career $career)
  {
    if ($career->user_id !== Auth::user()->id AND Auth::user()->role == 'mahasiswa') {
      abort(403);
    }

    return view('dashboard.careers.show', [
      'career' => $career
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Career $career)
  {
    // allowing admin with same faculty to edit the resource
    if(
      ($career->user_id != Auth::user()->id && Auth::user()->role == 'mahasiswa')
      || 
      (Auth::user()->fakultas != $career->user->fakultas && Auth::user()->role == 'admin')
    )
    {
      return abort(403);
    }

    return view('dashboard.careers.edit', [
      'career' => $career
    ]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Career $career)
  {
    // allowing admin with same faculty to edit the resource
    if(
      ($career->user_id != Auth::user()->id && Auth::user()->role == 'mahasiswa')
      || 
      (Auth::user()->fakultas != $career->user->fakultas && Auth::user()->role == 'admin')
    )
    {
      return abort(403);
    }

    $rules = [
      'company_name' => 'required',
      'position' => 'required',
      'url' => 'url|nullable',
      'description' => 'required',
      'image' => 'image|file|max:2048',
    ];

    if ($request->slug != $career->slug) {
      $rules['slug'] = 'required|unique:careers';
    }

    $validatedData = $request->validate($rules);

    if ($request->file('image')) {
      if ($request->oldImage) {
        Storage::delete($request->oldImage);
      }
      $validatedData['image'] = $request->file('image')->store('careers-images');
    }

    // $validatedData['user_id'] = Auth::user()->id; //dimatikan agar jika admin mengedit postingan karir tidka mengambil hak milik postingan
    $validatedData['excerpt'] = Str::limit(strip_tags($validatedData['description']), 100);

    $career->update($validatedData);

    if(Auth::user()->role != 'mahasiswa'){
      return redirect('/dashboard/admin/'.$career->user->id)->with('success', 'Career has been updated!');
    }

    return redirect('/dashboard/career')->with('success', 'Career has been updated!');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Career $career)
  {
    // allowing admin with same faculty to delete the resource
    if(
      ($career->user_id != Auth::user()->id && Auth::user()->role == 'mahasiswa')
      || 
      (Auth::user()->fakultas != $career->user->fakultas && Auth::user()->role == 'admin')
    )
    {
      return abort(403);
    }

    if ($career->image) {
      Storage::delete($career->image);
    }
    $career->delete();

    if(Auth::user()->role != 'mahasiswa'){
      return redirect('/dashboard/admin/'.$career->user->id)->with('success', 'Career has been deleted!');
    }

    return redirect('/dashboard/career')->with('success', 'Career has been deleted!');
  }

  public function checkSlug(Request $request)
  {
    if (!$request->has('company_name')) {
        return abort(404);
    }

    $slug = SlugService::createSlug(Career::class, 'slug', $request->company_name);
    return response()->json(['slug' => $slug], 200);
  }
}
