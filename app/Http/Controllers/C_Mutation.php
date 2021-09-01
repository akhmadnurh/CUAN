<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\M_Mutation;
use Illuminate\Http\Request;

class C_Mutation extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function total($total)
    {
        // $total = collect('total');
        // dump($total->all());
        // return view('dashboard');
    }

    public function incomingTransactions()
    {
        return view('riwayatMasuk');
    }

    public function outgoingTransactions()
    {
        return view('riwayatKeluar');
    }

    public function addMutation(Request $request)
    {
        $add = M_Mutation::addMutation(session()->get('user_id'), $request->input());
        if ($add) {
            return redirect('/')->with(['status' => 'success', 'msg' => 'Transaksi berhasil disimpan.']);
        } else {
            return redirect('/')->with(['status' => 'error', 'msg' => 'Transaksi gagal disimpan.']);
        }
    }

}
