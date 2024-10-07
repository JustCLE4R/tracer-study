<?php

namespace App\Http\Controllers\SuperAdmin;

use Illuminate\Http\Request;
use App\Imports\FullTimeImport;
use App\Imports\WirausahaImport;
use App\Imports\LanjutStudiImport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

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
            'title' => 'Pekerja Full Time',
            'url' => '/dashboard/admin/super/import/full-time',
        ]);
    }

    public function storeFullTime(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xls,xlsx',
        ]);

        $import = new FullTimeImport();
        Excel::import($import, $request->file('file'));

        // Check for failures
        if ($import->failures()->isNotEmpty()) {
            // Extract failure messages into an array
            $failures = $import->failures();
            $errorMessages = [];

            foreach ($failures as $failure) {
                $errorMessages[] = 'Baris ' . $failure->row() . ': ' . implode(', ', $failure->errors());
            }

            // Return the errors to the view
            return redirect()->back()->withErrors($errorMessages);
        }


        return redirect('/dashboard/admin/super/import')->with('success', 'Pekerja Full Time has been imported');
    }

    public function importWirausaha()
    {
        return view('dashboard.super-admin.import.import', [
            'title' => 'Pekerja Wirausaha',
            'url' => '/dashboard/admin/super/import/wirausaha',
        ]);
    }

    public function storeWirausaha(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xls,xlsx',
        ]);

        $import = new WirausahaImport();
        Excel::import($import, $request->file('file'));

        // Check for failures
        if ($import->failures()->isNotEmpty()) {
            // Extract failure messages into an array
            $failures = $import->failures();
            $errorMessages = [];

            foreach ($failures as $failure) {
                $errorMessages[] = 'Baris ' . $failure->row() . ': ' . implode(', ', $failure->errors());
            }

            // Return the errors to the view
            return redirect()->back()->withErrors($errorMessages);
        }


        return redirect('/dashboard/admin/super/import')->with('success', 'Pekerja Wirausaha has been imported');
    }
    
    public function importLanjutStudi()
    {
        return view('dashboard.super-admin.import.import', [
            'title' => 'Lanjut Studi',
            'url' => '/dashboard/admin/super/import/lanjut-studi',
        ]);
    }

    public function storeLanjutStudi(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xls,xlsx',
        ]);

        $import = new LanjutStudiImport();
        Excel::import($import, $request->file('file'));

        // Check for failures
        if ($import->failures()->isNotEmpty()) {
            // Extract failure messages into an array
            $failures = $import->failures();
            $errorMessages = [];

            foreach ($failures as $failure) {
                $errorMessages[] = 'Baris ' . $failure->row() . ': ' . implode(', ', $failure->errors());
            }

            // Return the errors to the view
            return redirect()->back()->withErrors($errorMessages);
        }


        return redirect('/dashboard/admin/super/import')->with('success', 'Lanjut Studi has been imported');
    }
}
