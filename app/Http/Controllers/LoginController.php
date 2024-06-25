<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // login
    public function index()
    {
        return view('adminView/login', [
            'tittle' => 'Halaman Login'
        ]);
    }

    public function auth(Request $request)
    {
        $datalogin = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($datalogin)) {
            $request->session()->regenerate();

            return redirect()->intended('/admin');
        }

        return back()->with('loginError', 'Username atau password salah');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
