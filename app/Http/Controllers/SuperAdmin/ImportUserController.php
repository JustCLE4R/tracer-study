<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ImportUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.super-admin.import.index');
    }

    public function importFullTime()
    {
        return view('dashboard.super-admin.import.import', [
            'url' => '/dashboard/admin/super/import/full-time',
        ]);
    }

    public function storeFullTime(Request $request)
    {
        dd($request->all());
    }

    public function importWirausaha()
    {
        return view('dashboard.super-admin.import.import', [
            'url' => '/dashboard/admin/super/import/wirausaha',
        ]);
    }

    public function storeWirausaha(Request $request)
    {
        // 
    }
    
    public function importLanjutStudi()
    {
        return view('dashboard.super-admin.import.import', [
            'url' => '/dashboard/admin/super/import/lanjut-studi',
        ]);
    }

    public function storeLanjutStudi(Request $request)
    {
        // 
    }
}
