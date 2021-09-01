<?php

namespace App\Models;

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

    public static function total($total)
    {
        $total = DB::table('mutation')->sum('total');

    }

    public static function getCategories()
    {
        return DB::table('categories')->select('*')->get();
    }

    public static function getMutationTypes()
    {
        return DB::table('mutation_types')->select('*')->get();
    }

    public static function addMutation($id, $input)
    {
        $add = DB::table('mutations')->insert(['user_id' => $id, 'type_id' => $input['mutation-type'], 'category_id' => $input['category'], 'date' => $input['date'], 'time' => $input['time'], 'description' => $input['description'], 'total' => $input['total']]);
        if ($add) {
            return true;
        } else {
            return false;
        }
    }
}
