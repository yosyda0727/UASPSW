<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Spatie\Permission\Models\Role;


class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware("role:admin");
    }
    public function index()
    {
        $users = User::with('roles')->get(); // Eager load roles
        $roles = Role::all(); // Mengambil semua role
        return view("admin.home", compact('users', 'roles'));
    }

    public function updateRole(Request $request, User $user)
    {
        $request->validate([
            'role' => 'required|exists:roles,name',
        ]);

        $user->syncRoles($request->role); // Mengubah role user

        return redirect()->back()->with('success', 'Role updated successfully.');
    }




}


