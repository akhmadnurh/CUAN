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

    public static function editCategory($id, $name)
    {
        return DB::table('categories')->where('category_id', $id)->update(['category_name' => $name]);
    }

    public static function getUnpaidDebtCredits($id)
    {
        return DB::table('debt_credits')->join('debt_credit_statuses', 'debt_credits.status_id', '=', 'debt_credit_statuses.status_id')->join('debt_credit_types', 'debt_credits.type_id', '=', 'debt_credit_types.type_id')->select('*')->where('user_id', $id)->where('debt_credit_statuses.status_id', 2)->orderBy('debt_id', 'asc')->get();
    }

    public static function getDebtCreditTypes()
    {
        return DB::table('debt_credit_types')->select('*')->get();
    }

    public static function addDebtCredit($id, $input)
    {
        return DB::table('debt_credits')->insert(['user_id' => $id, 'type_id' => $input['mutation-type'], 'borrower' => $input['borrower'], 'nominal' => $input['total'], 'paid' => 0, 'status_id' => 2]);
    }

    public static function getBalance($id)
    {
        $incoming = DB::table('mutations')->where('type_id', 1)->where('user_id', $id)->sum('total');
        $outgoing = DB::table('mutations')->where('type_id', 2)->where('user_id', $id)->sum('total');
        return $incoming - $outgoing;
    }

    public static function getTotalDebt($id)
    {
        $total = DB::table('debt_credits')->where('type_id', 1)->where('status_id', 2)->sum('nominal');
        $paid = DB::table('debt_credits')->where('type_id', 1)->where('status_id', 2)->sum('paid');
        return $total - $paid;
    }

    public static function getTotalCredit($id)
    {
        $total = DB::table('debt_credits')->where('type_id', 2)->where('status_id', 2)->sum('nominal');
        $paid = DB::table('debt_credits')->where('type_id', 2)->where('status_id', 2)->sum('paid');
        return $total - $paid;
    }

    public static function sincere($id)
    {
        return DB::table('debt_credits')->where('debt_id', $id)->update(['status_id' => 3]);
    }

    public static function pay($input)
    {
        $data = DB::table('debt_credits')->select('*')->where('debt_id', $input['debt-id'])->first();
        $status = ($input['nominal'] + $data->paid) >= $data->nominal ? 1 : 2;
        return DB::table('debt_credits')->where('debt_id', $input['debt-id'])->update(['status_id' => $status, 'paid' => ($input['nominal'] + $data->paid)]);
    }
}
