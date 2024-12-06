<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserPasswordRequest;

class UserController extends Controller
{
    public function showUpdatePassword(){
        return view('dashboard.updatePassword');
    }
    
    public function updatePassword(UpdateUserPasswordRequest $request){
        $request->user()->update([
            'password' => md5($request->password)
        ]);
    
        return redirect('/dashboard')->with('success', 'Password berhasil diperbarui');
    }
    
}
