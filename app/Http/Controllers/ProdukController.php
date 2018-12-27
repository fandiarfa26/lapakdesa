<?php

namespace App\Http\Controllers;

use Cookie;
use App\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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

        return view('detail_produk', ['produk'=>$p]);
    }

    

    public function cart($id)
    {
        $p = Produk::findOrFail($id);

        $jmlbeli = session()->get('jmlbeli');

        return view('cart', ['produk'=>$p, 'jml'=>$jmlbeli]);
    }

    public function addCart(Request $request,$id)
    {
        
        if ($request->jmlbeli == null){
            $jmlbeli = 1;
        }else{
            $jmlbeli = $request->jmlbeli;
        }
        
        // $c = Cookie('jmlbeli', $jmlbeli, true, time() + 86400);
        session()->put('jmlbeli', $jmlbeli);
        return redirect('/produk/'.$id.'/beli');
    }
}
