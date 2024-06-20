<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('pages.admin.dashboard', [
            'title' => 'Dashboard',
            'active' => 'dashboard',
            'users' => $users
        ]);
    }

    public function userStore(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'roles' => 'required',
        ]);

        // Hash password
        $validatedData['password'] = Hash::make($validatedData['password']);

        // Buat user
        $user = User::create($validatedData);

        if ($user) {
            session()->flash('success', 'User berhasil ditambahkan!');

        } else {
            session()->flash('success', 'User gagal ditambahkan!');
        }
        return redirect()->back();
    }

    public function userUpdate(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->input('name', $user->name);
        $user->email = $request->input('email', $user->email);
        $user->roles = $request->input('roles', $user->roles);
        
        $user->save();

        if ($user) {
            session()->flash('success', 'User berhasil diedit!');

        } else {
            session()->flash('success', 'User gagal diedit!');
        }
        return redirect()->back();
    }

    public function userDestroy($id)
    {
        $user = User::find($id);
        $user->delete();

        if ($user) {
            session()->flash('success', 'User berhasil dihapus!');

        } else {
            session()->flash('success', 'User gagal dihapus!');
        }
        return redirect()->back();
    }
}
