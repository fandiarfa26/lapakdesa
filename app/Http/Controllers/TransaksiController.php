<?php

namespace App\Http\Controllers;

use Auth;
use App\Transaksi;
use App\Produk;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $t = Transaksi::where('user_id', Auth::user()->id)->get();

        return view('transaksi', ['transaksi'=>$t]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $v = Validator::make($request->all(), [
            'jumlah_beli' => 'required',
            'nama_tujuan' => 'required',
            'alamat_tujuan' => 'required',
            'nohp_tujuan' => 'required'
        ]);
        if ($v->fails())
        {
            return response()->json([
                'status' => 'error',
                'errors' => $v->errors()
            ], 422);
        }
        $transaksi = new Transaksi;
        $transaksi->user_id = Auth::user()->id;
        $transaksi->produk_id = $request->produk_id;
        $transaksi->usaha_id = $request->usaha_id;
        $transaksi->jumlah_beli = $request->jumlah_beli;
        $transaksi->nama_tujuan = $request->nama_tujuan;
        $transaksi->alamat_tujuan = $request->alamat_tujuan;
        $transaksi->nohp_tujuan = $request->nohp_tujuan;

        $harga_produk = Produk::find($request->produk_id)->harga;
        $transaksi->total_biaya = $harga_produk * $request->jumlah_beli;

        if ($transaksi->save()){
            swal()->autoclose(3000)->success('Pesanan Anda akan segera diproses!','Terima Kasih');
        }else{
            swal()->autoclose(3000)->error('Gagal!');
        }

        return redirect('/transaksi');
    }

    
    public function show($id)
    {
        $t = Transaksi::find($id);
        
        return view('detail_transaksi', ['t'=>$t]);
    }

    
}
