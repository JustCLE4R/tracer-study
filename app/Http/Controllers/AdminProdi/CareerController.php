<?php

namespace App\Http\Controllers\AdminProdi;

use App\Models\Career;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\AdminProdi\UpdateJudgeRequest;
use App\Http\Requests\AdminProdi\UpdateCareerRequest;

class CareerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(career $career)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(career $career)
    {
        return view('dashboard.admin-prodi.career.edit', [
            'career' => $career
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCareerRequest $request, career $career)
    {
        $prepareData = $request->all();

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $prepareData['image'] = $request->file('image')->store('careers-images');
        }

        $career->update($prepareData);

        $from = $request->input('from', 'pending');
        return redirect('/dashboard/admin/fakultas/career/'.$from)->with('success', 'Pengajuan karir berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, career $career)
    {
        $career->delete();

        $from = $request->input('from', 'pending');

        if($request->input('from')) {
            return redirect('/dashboard/admin/fakultas/career/'.$from)->with('success', 'Pengajuan karir berhasil dihapus');
        }

        return redirect()->back()->with('success', 'Pengajuan karir berhasil dihapus');
    }

    public function judgeCareer(career $career)
    {
        return view('dashboard.admin-prodi.career.judge', [
            'career' => $career
        ]);
    }

    public function updateJudge(UpdateJudgeRequest $request, career $career)
    {
        $career->update([
            'status' => $request->status,
            'reason' => $request->reason,
        ]);

        $from = $request->input('from', 'pending');
        return redirect('/dashboard/admin/fakultas/career/'.$from)->with('success', 'Pengajuan karir ditolak');
    }

    public function pendingCareers()
    {
        $careers = career::where('status', 'pending')->paginate(20);

        return view('dashboard.admin-prodi.career.index', [
            'from' => 'pending',
            'careers' => $careers
        ]);
    }

    public function rejectedCareers()
    {
        $careers = career::where('status', 'rejected')->paginate(20);

        return view('dashboard.admin-prodi.career.index', [
            'from' => 'rejected',
            'careers' => $careers
        ]);
    }

    public function approvedCareers()
    {
        $careers = career::where('status', 'approved')->paginate(20);

        return view('dashboard.admin-prodi.career.index', [
            'from' => 'approved',
            'careers' => $careers
        ]);
    }
}
