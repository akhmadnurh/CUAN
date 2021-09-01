<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_Debt_Credit extends Model
{
    use HasFactory;
    public static function debt_credit($debt_credit){
        $debt_credit = DB::select('select * from debt_credits where user_id = $debt_credit', [1]);

        return view('dashboard', ['debt_credit' => $debt_credit]);
    }
   
}
