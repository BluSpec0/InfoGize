<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function showChangePasswordForm()
    {
        return view('pages/userprofile');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:8|confirmed',
            'confirm_password' => 'required|same:new_password',
        ]);

        $user = Auth::user();

        if (Hash::check($request->current_password, $user->password)) {
            $user->update([
                'password'=>bcrypt($request->new_password)
            ]);
            return redirect('profile')->back()->with('succes', 'Kata sandi telah diubah');
        }else{
            return redirect('profile')->back()->with('error', 'Kata sandi saat ini salah');
        }
    }
}
