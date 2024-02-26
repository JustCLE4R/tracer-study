<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class StudentController extends Controller
{
    public function fetchStudentData($nim)
    {
        $response = Http::get("https://api.example.com/student/{$nim}");

        return $response->json();
    }
}
