<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        return view('pages.home.profile', [
            'title' => 'Profile',
            'active' => 'profile',
            'user' => $user
        ]);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->input('name', $user->name);

        $user->save();

        if ($user) {
            session()->flash('success', 'Profile berhasil diedit!');

        } else {
            session()->flash('success', 'Profile gagal diedit!');
        }
        return redirect()->back();
    }
}
