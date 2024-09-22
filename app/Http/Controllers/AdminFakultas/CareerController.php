<?php

namespace App\Http\Controllers\AdminFakultas;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateJudgeRequest;
use App\Models\career;
use Illuminate\Http\Request;

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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, career $career)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(career $career)
    {
        //
    }

    public function judgeCareer(career $career)
    {
        return view('dashboard.admin-fakultas.career.judge', [
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

        return view('dashboard.admin-fakultas.career.index', [
            'from' => 'pending',
            'careers' => $careers
        ]);
    }

    public function rejectedCareers()
    {
        $careers = career::where('status', 'rejected')->paginate(20);

        return view('dashboard.admin-fakultas.career.index', [
            'from' => 'rejected',
            'careers' => $careers
        ]);
    }

    public function approvedCareers()
    {
        $careers = career::where('status', 'approved')->paginate(20);

        return view('dashboard.admin-fakultas.career.index', [
            'from' => 'approved',
            'careers' => $careers
        ]);
    }
}
