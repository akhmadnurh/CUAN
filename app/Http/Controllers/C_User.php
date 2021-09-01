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
        return view('dashboard');
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
        $register = M_User::register($request->input());
        if ($register == 'error') {
            return redirect('login')->with(['status' => 'error', 'msg' => 'Pendaftaran gagal, periksa kembali data anda.']);
        } elseif ($register == 'email-exist') {
            return redirect('login')->with(['status' => 'error', 'msg' => 'Email sudah pernah terdaftar, silakan menggunakan email yang lain.']);
        } else {
            // send email
            $fullname = $request->input('firstname') . ' ' . $request->input('lastname');
            Mail::to($request->input('emailRegister'))->send(new RegisterToken($fullname, $request->input('emailRegister'), $register));

            return redirect('verify-account')->with(['status' => 'success', 'msg' => 'Pendaftaran berhasil, silakan cek email anda untuk melihat kode token anda.']);
        }
    }

    public static function verifyAccount()
    {
        return view('verifikasi');
    }

    public static function verifyAccountProcess(Request $request)
    {
        $verify = M_User::verifyEmail(intval($request->input('token')));
        if ($verify) {
            return redirect('login')->with(['status' => 'success', 'msg' => 'Verifikasi email berhasil']);
        } else {
            return redirect('verify-account')->with(['status' => 'error', 'msg' => 'Token tidak sesuai']);
        }
    }

    public static function editProfile()
    {
        $data = M_User::getUserData(session()->get('user_id'));
        return view('editProfile', ['data' => $data]);
    }

    public static function editProfileProcess(Request $request)
    {
        $edit = M_User::editProfile(session()->get('user_id'), $request->input());
    }
}
