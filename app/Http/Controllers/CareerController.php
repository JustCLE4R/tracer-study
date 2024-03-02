<?php

namespace App\Http\Controllers;

use App\Models\Career;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;

class CareerController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    return view('dashboard.careers.index', [
      'careers' => Career::where('user_id', auth()->user()->id)->get()
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
      'position' => 'required',
      'url' => 'url|nullable',
      'slug' => 'required|unique:careers',
      'description' => 'required',
      'image' => 'image|file|max:2048',
    ]);

    if ($request->file('image')) {
      $validatedData['image'] = $request->file('image')->store('careers-images');
    }

    $validatedData['user_id'] = auth()->user()->id;
    $validatedData['excerpt'] = Str::limit(strip_tags($validatedData['description']), 200);

    Career::create($validatedData);

    return redirect('/dashboard/career')->with('success', 'New career has been added!');

  }

  /**
   * Display the specified resource.
   */
  public function show(Career $career)
  {
    return view('dashboard.careers.show', [
      'career' => $career
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Career $career)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Career $career)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Career $career)
  {
    //
  }

  public function checkSlug(Request $request)
  {
    $slug = SlugService::createSlug(Career::class, 'slug', $request->company_name);
    return response()->json(['slug' => $slug]);
  }
}
