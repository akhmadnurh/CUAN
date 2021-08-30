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
        $auth = DB::table('users')->select('*')->where('email', $email)->where('password', $password);
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
}
