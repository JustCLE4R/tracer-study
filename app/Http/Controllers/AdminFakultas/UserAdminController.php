<?php

namespace App\Http\Controllers\AdminFakultas;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminFakultas\UpdateUserAdminRequest;
use Illuminate\Support\Facades\Auth;

class UserAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = User::where('role', 'adminprodi')
                        ->where('fakultas', Auth::user()->fakultas)
                        ->latest();

        if (request('search')) {
            $query->where(function($query) {
                $query->where('nama', 'like', '%' . request('search') . '%')
                    ->orWhere('email', 'like', '%' . request('search') . '%');
            });
        }
        
        return view('dashboard.admin-fakultas.user-admin.index', [
            'users' => $query->paginate(20)->withQueryString()
        ]);
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
    public function show(User $user)
    {
        // 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $roles = User::enumValues('role');
        return view('dashboard.admin-fakultas.user-admin.edit', [
            'user' => $user,
            'roles' => $roles
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserAdminRequest $request, User $user)
    {
        if ($request->password) {
            $request->merge([
                'password' => bcrypt(md5($request->password))
            ]);
        } else {
            $request->request->remove('password');
        }

        $user->update($request->all());

        return redirect('/dashboard/admin/fakultas/user-admin/' . $user->id . '/edit')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
