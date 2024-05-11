<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.admin.laporan.index', [
            'laporans' => Laporan::orderBy('created_at', 'desc')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.admin.laporan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = $request->validate([
            'title' => 'required|string|max:255',
            'laporan' => 'required|file|mimes:pdf|max:51200',
        ],[
            'required' => 'Kolom :attribute wajib diisi.',
            'string' => 'Kolom :attribute harus berupa teks.',
            'max' => 'Kolom :attribute maksimal :max.',
            'mimes' => 'Kolom :attribute harus berupa berkas berformat PDF.',
        ],[
            'title' => 'Judul',
            'laporan' => 'Laporan',
        ]);

        $dataPrepare = [
            'title' => $rules['title'],
            'laporan' => $request->file('laporan')->store('laporan'),
        ];

        Laporan::create($dataPrepare);
        return redirect('/dashboard/admin/laporan')->with('success', 'Laporan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Laporan $laporan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Laporan $laporan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Laporan $laporan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Laporan $laporan)
    {
        //
    }
}
