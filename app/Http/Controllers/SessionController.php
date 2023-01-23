<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SessionController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required'
        ]);


        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return to_route('employee');
        }

        return back()->with('fmsg', 'The provided credentials are incorrect.');
    }
    public function destroy()
    {
        auth()->logout();
        return redirect('/');
    }
}
