<?php

namespace App\Http\Controllers;

use App\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $p = DB::table('produk')
                ->select('produk.*')
                ->join('usaha','usaha.id','=','produk.usaha_id')
                ->where('usaha.terverifikasi', 1)
                ->orderBy('produk.created_at', 'desc')
                ->get();

        return view('produk',['produk'=>$p]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $p = Produk::findOrFail($id);

        $op = Produk::where('usaha_id', $p->usaha_id)
                    ->where('id','!=',$p->id)
                    ->get();

        return view('detail_produk', ['produk'=>$p, 'produklain'=>$op]);
    }

    public function cari($keyword)
    {
        $p = DB::table('produk')
                ->select('produk.*')
                ->join('usaha','usaha.id','=','produk.usaha_id')
                ->where('usaha.terverifikasi', 1)
                ->where('produk.nama','LIKE','%'.$keyword.'%')
                ->orderBy('produk.created_at', 'desc')
                ->get();

        return view('cari', ['produk'=>$p, 'keyword'=>$keyword]);
    }

    public function postCari(Request $request)
    {
        return redirect('/cari/'.$request->keyword);
    }

    public function cart($id)
    {
        $p = Produk::findOrFail($id);

        return view('cart', ['produk'=>$p]);
    }
}
