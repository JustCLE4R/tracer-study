<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\StudentController;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function attemptLogin(Request $request)
    {
        $credentials = $request->only($this->username(), 'password');

        // Fetch user data from the API
        $studentController = new StudentController();
        $apiData = $studentController->fetchStudentData($credentials['nim']);

        // Check if the API data contains a valid user with the provided credentials
        if ($apiData && md5($credentials['password']) === $apiData['hashed_password']) {
            // API authentication successful
            Auth::loginUsingId($apiData['id']); // Log in the user
            return true;
        }

        return false;
    }
}
