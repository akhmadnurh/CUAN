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
        $total = DB::table('mutation')->get();
        // $total = collect('total');
        // dump($total->all());

        // return view('dashboard');
    }

    public function incomingTransactions()
    {
        $data['transactions'] = M_Mutation::getIncomingTransactions(session()->get('user_id'));
        return view('riwayatMasuk', $data);
    }

    public function outgoingTransactions()
    {
        $data['transactions'] = M_Mutation::getOutgoingTransactions(session()->get('user_id'));
        return view('riwayatKeluar', $data);
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

    public function debts()
    {
        $data['debts'] = M_Mutation::getDebts(session()->get('user_id'));
        return view('riwayatHutang', $data);
    }

    public function credits()
    {
        $data['credits'] = M_Mutation::getCredits(session()->get('user_id'));
        return view('riwayatPiutang', $data);
    }

    public function categories()
    {
        $data['categories'] = M_Mutation::getCategories();
        return view('kategori', $data);
    }

    public function addCategory(Request $request)
    {
        $add = M_Mutation::addCategory($request->input('category'));
        if ($add) {
            return redirect('/categories')->with(['status' => 'success', 'msg' => 'Kategori berhasil ditambahkan.']);
        } else {
            return redirect('/categories')->with(['status' => 'error', 'msg' => 'Gagal menambahkan kategori.']);
        }
    }

    public function removeCategory(Request $request)
    {
        $remove = M_Mutation::removeCategory($request->segment(2));
        if ($remove) {
            return redirect('/categories')->with(['status' => 'success', 'msg' => 'Kategori berhasil dihapus.']);
        } else {
            return redirect('/categories')->with(['status' => 'error', 'msg' => 'Gagal menghapus kategori.']);
        }
    }

    public function debtCredits()
    {
        return view('hutangPiutang');
    }

    public function editCategory(Request $request)
    {
        $edit = M_Mutation::editCategory($request->input('id-edit'), $request->input('name-edit'));
        if($edit){
            return redirect('/categories')->with(['status' => 'success', 'msg' => 'Kategori berhasil diedit.']);
        }else{
            return redirect('/categories')->with(['status' => 'error', 'msg' => 'Gagal mengedit kategori.']);
        }
    }
}
