<?php

namespace App\Http\Controllers\Usaha;

use App\Transaksi;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $t = Transaksi::where('usaha_id', Auth::user()->usaha->id)
                    ->orderBy('created_at', 'desc')
                    ->get();
        
        return view('panelUsaha.tabel_transaksi', ['transaksi'=>$t]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $t = Transaksi::where('usaha_id', Auth::user()->usaha->id)
                    ->where('id',$id)
                    ->first();
        
        return view('panelUsaha.detail_transaksi', ['t'=>$t]);
    }

    
}
