<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class M_User extends Model
{
    use HasFactory;

    public static function login($email, $password)
    {
        $auth = DB::table('users')->select('*')->where('email', $email)->where('password', md5($password));
        if ($auth->count() > 0) {
            $userdata = $auth->first();
            // check if email verified
            $verification = DB::table('email_verifications')->select('*')->where('user_id', $userdata->user_id)->first();
            if ($verification->status == 1) {
                return 'success';
            } else {
                return 'email-verification-error';
            }
        } else {
            return 'error';
        }
    }

    public static function register($input)
    {
        // Check email if exist
        $email_check = DB::table('users')->select('*')->where('email', $input['emailRegister'])->count();
        if ($email_check > 0) {
            return 'email-exist';
        } else {
            // Insert data to database
            $addData = DB::table('users')->insert(['firstname' => $input['firstname'], 'lastname' => $input['lastname'], 'email' => $input['emailRegister'], 'password' => md5($input['passwordRegister']), 'profile_photo' => 'default.png']);
            if ($addData) {
                // Add token
                $user_id = DB::table('users')->select('user_id')->where('email', $input['emailRegister'])->first();
                // Generate token
                $token = rand(1000, 9999);
                DB::table('email_verifications')->insert(['user_id' => $user_id->user_id, 'status' => 0, 'token' => $token]);

                // Success
                return $token;
            } else {
                return 'error';
            }
        }
    }
}
