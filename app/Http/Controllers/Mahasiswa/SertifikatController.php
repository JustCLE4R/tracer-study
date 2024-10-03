<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Models\CertCheck;
use Endroid\QrCode\Builder\Builder;
use App\Http\Controllers\Controller;
use Endroid\QrCode\Writer\PngWriter;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SertifikatController extends Controller
{
    public function show()
    {
        $certCheck = CertCheck::where('user_id', Auth::user()->id)->firstOrCreate([
            'user_id' => Auth::user()->id,
        ], [
            'profile_check' => false,
            // 'pendidikan_check' => false,
            // 'pekerjaan_check' => false,
            'karir_check' => false,
            'questioner_check' => false,
        ]);

        // if ($certCheck->profile_check && $certCheck->pendidikan_check && $certCheck->pekerjaan_check && $certCheck->questioner_check && !$certCheck->qr_code) 
        if ($certCheck->profile_check && $certCheck->karir_check && $certCheck->questioner_check && !$certCheck->qr_code)
        {
            $qrcode = uniqid("cert-", true);

            $result = Builder::create()
                ->writer(new PngWriter())
                ->data(config('app.url') . '/sertifikat/' . $qrcode)
                ->size(300)
                ->margin(10)
                ->build();

            $path = 'qrcodes/' . $qrcode . '.png';
            Storage::put($path, $result->getString());

            CertCheck::where('user_id', Auth::user()->id)->update([
                'qr_code' => $path,
                'qr_url' => $qrcode
            ]);
        }

        $certCheck->refresh();

        if (!$certCheck->qr_code) {
            return view('dashboard.sertifikat.notCompleteYet', [
                'sertifikat' => $certCheck
            ]);
        }

        return view('dashboard.sertifikat.index', [
            'sertifikat' => $certCheck
        ]);
    }
}