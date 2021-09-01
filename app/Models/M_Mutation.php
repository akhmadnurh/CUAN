<?php

namespace App\Models\M_Mutation;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class M_Mutation extends Model
{
    use HasFactory;

    // $total = DB::table('mutations')
    //         ->whereNull('mutation_id');

    // $users = DB::table('mutations')
    //             ->whereNull('last_name')
    //             ->union()
    //             ->get();
            
    public static function total ($total){
    $total = DB::table('mutation')->sum('total');

    }

}
