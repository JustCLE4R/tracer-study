<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Models\Laporan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->role != 'superadmin') {
            return abort(403);
        }

        return view('dashboard.admin.laporan.index', [
            'laporans' => Laporan::orderBy('created_at', 'desc')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (auth()->user()->role != 'superadmin') {
            return abort(403);
        }

        return view('dashboard.admin.laporan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (auth()->user()->role != 'superadmin') {
            return abort(403);
        }

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
            'laporan' => $request->file('laporan')->storeAs('laporan', Str::slug($rules['title']) . '.' . $request->file('laporan')->extension(), 'public'),
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
        if (auth()->user()->role != 'superadmin') {
            return abort(403);
        }

        return view('dashboard.admin.laporan.edit', [
            'laporan' => $laporan
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Laporan $laporan)
    {
        if (auth()->user()->role != 'superadmin') {
            return abort(403);
        }

        $rules = $request->validate([
            'title' => 'required|string|max:255',
            'laporan' => 'file|mimes:pdf|max:51200',
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
        ];

        if($request->file('laporan')){
            Storage::delete($laporan->laporan);
            $dataPrepare['laporan'] =$request->file('laporan')->storeAs('laporan', Str::slug($rules['title']) . '.' . $request->file('laporan')->extension(), 'public');
        }

        $laporan->update($dataPrepare);
        return redirect('/dashboard/admin/laporan')->with('success', 'Laporan berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Laporan $laporan)
    {
        if (auth()->user()->role != 'superadmin') {
            return abort(403);
        }

        Storage::delete($laporan->laporan);
        $laporan->delete();
        return redirect('/dashboard/admin/laporan')->with('success', 'Laporan berhasil dihapus');
    }
}
