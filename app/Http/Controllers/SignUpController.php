<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\User;
use Illuminate\Http\Request;

class SignUpController extends Controller
{
    public function index() {
        $formdata = [
            'name' => ['text', "Name"],
            'email' => ['text', "Email"],
            'password' => ['password', "Password"],
            'repassword' => ['password', "Re-Enter Password"],
        ];
        return view('signup', compact('formdata'));
    }

    public function savesignup(Request $request) {
        $key = $request->validate([
            'name' => 'required|min:2|max:255',
            'email' => 'required|min:5|unique:users|email:dns',
            'password' => 'required|min:5',
            'repassword' => 'required|same:password',
        ]);

        $value = array(
            $name = 'name' => $request-> input('name'),
            $email = 'email' => $request-> input('email'),
            $password = 'password' => $request-> input('password'),
            $repassword = 'repassword' => $request-> input('repassword'),
        );

        $key['password'] = bcrypt($key['password']);
        $hashedpass = $key['password'];

        User::create([
            'name' => $request-> input('name'),
            'email' => $request-> input('email'),
            'password' => $hashedpass,
        ]);

        return redirect()->route('user-login')->with('success', 'Sign Up Success! Please Log In');
    }

}
