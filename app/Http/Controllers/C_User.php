<?php

namespace App\Http\Controllers;

use App\Mail\RegisterToken;
use App\Models\M_User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class C_User extends Controller
{
    public static function login()
    {
        if (session()->has('loggedIn')) {
            return redirect('/');
        } else {
            return view('login');
        }
    }

    public static function dashboard()
    {
//        if (session()->has('loggedIn')) {
        return view('dashboard');
//        } else {
//            return redirect('login');
//        }
    }

    public static function loginProcess(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        $login = M_User::login($email, $password);
        if ($login == 'success') {
            session(['loggedIn' => true]);
            return redirect('/');
        } elseif ($login == 'email-verification-error') {
            return redirect('/login')->with(['status' => 'error', 'msg' => 'Email belum diverifikasi, silakan cek email anda.']);
        } else {
            return redirect('/login')->with(['status' => 'error', 'msg' => 'Email/password salah.']);
        }
    }

    public static function logout()
    {
        session()->flush();
        return redirect('login');
    }

    public static function register(Request $request)
    {
//        $register = M_User::register($request->input());
        var_dump($register);
//        if ($register != 'error') {
//            // send email
//            $fullname = $request->input('firstname').' '.$request->input('lastname');
//            Mail::to($request->input('emailRegister'))->send(new RegisterToken($fullname, $request->input['emailRegister'], $register));
//
//            return redirect('verify-account')->with(['status' => 'success', 'msg' => 'Pendaftaran berhasil, silakan cek email anda untuk melihat kode token anda.']);
//        } elseif ($register == 'email-exist') {
//            return redirect('login')->with(['status' => 'error', 'msg' => 'Email sudah pernah terdaftar, silakan menggunakan email yang lain.']);
//        } else {
//            return redirect('login')->with(['status' => 'error', 'msg' => 'Pendaftaran gagal, periksa kembali data anda.']);
//
//        }
    }

    public static function verifyAccount()
    {
        return view('verifikasi');
    }
}
