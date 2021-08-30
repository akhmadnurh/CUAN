<?php

namespace App\Http\Controllers;

use App\Models\M_User;
use Illuminate\Http\Request;

class C_User extends Controller
{
    public static function login()
    {
        return view('login');
    }

    public static function dashboard()
    {
        return view('dashboard');
    }

    public static function loginProcess(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        $login = M_User::login($email, $password);
        if ($login == 'success') {
            return redirect('/');
        } elseif ($login == 'email-verification-error') {
            return redirect('/login')->with(['status' => 'error', 'msg' => 'Email belum diverifikasi, silakan cek email anda.']);
        } else {
            return redirect('/login')->with(['status' => 'error', 'msg' => 'Email/password salah.']);
        }
    }
}
