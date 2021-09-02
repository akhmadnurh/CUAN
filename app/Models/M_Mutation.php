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

    public static function getIncomingTransactions($id)
    {
        return DB::table('mutations')->join('categories', 'mutations.category_id', '=', 'categories.category_id')->join('mutation_types', 'mutations.type_id', '=', 'mutation_types.type_id')->select('*')->where('user_id', $id)->where('mutations.type_id', 1)->orderBy('date', 'desc')->get();
    }

    public static function getOutgoingTransactions($id)
    {
        return DB::table('mutations')->join('categories', 'mutations.category_id', '=', 'categories.category_id')->join('mutation_types', 'mutations.type_id', '=', 'mutation_types.type_id')->select('*')->where('user_id', $id)->where('mutations.type_id', 2)->orderBy('date', 'desc')->get();
    }

    public static function getLatestTransactions($id)
    {
        return DB::table('mutations')->join('categories', 'mutations.category_id', '=', 'categories.category_id')->join('mutation_types', 'mutations.type_id', '=', 'mutation_types.type_id')->select('*')->where('user_id', $id)->orderBy('date', 'desc')->limit(5)->get();
    }

    public static function getDebts($id)
    {
        return DB::table('debt_credits')->join('debt_credit_statuses', 'debt_credits.status_id', '=', 'debt_credit_statuses.status_id')->join('debt_credit_types', 'debt_credits.type_id', '=', 'debt_credit_types.type_id')->select('*')->where('user_id', $id)->where('debt_credits.type_id', 1)->orderBy('debt_id', 'desc')->get();
    }

    public static function getCredits($id)
    {
        return DB::table('debt_credits')->join('debt_credit_statuses', 'debt_credits.status_id', '=', 'debt_credit_statuses.status_id')->join('debt_credit_types', 'debt_credits.type_id', '=', 'debt_credit_types.type_id')->select('*')->where('user_id', $id)->where('debt_credits.type_id', 2)->orderBy('debt_id', 'desc')->get();
    }

    public static function addCategory($category)
    {
        return DB::table('categories')->insert(['category_name' => $category]);
    }

    public static function removeCategory($id)
    {
        return DB::table('categories')->where('category_id', $id)->delete();
    }
}
