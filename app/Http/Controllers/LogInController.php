<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogInController extends Controller
{
    public function index() {
        $icon = 'ni ni-dashlite';
        $subtitle = 'Pegawai';
        $table_id = 'm_pegawai';

        return view('login',compact('subtitle','table_id','icon'));
    }

    public function authenticate(Request $request) {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required',
        ]);

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/admin/pegawai');
        }
        return back()->with('fail', 'Login Failed!');
    }

    public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('user-login');
    }
};
