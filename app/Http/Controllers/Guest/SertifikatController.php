<?php

namespace App\Http\Controllers\Guest;

use App\Models\CertCheck;
use App\Http\Controllers\Controller;

class SertifikatController extends Controller
{
    public function show($qr_url) {
        $certCheck = CertCheck::where('qr_url', $qr_url)->first();
    
        if (!$certCheck) {
            return view('publicSertifikat.notfound');
        }
    
        return view('publicSertifikat.index', [
            'sertifikat' => $certCheck
        ]);
    }
}
