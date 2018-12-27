<?php

namespace App\Http\Controllers;

use App\Usaha;
use App\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $u = Usaha::where('terverifikasi',1)
                ->orderBy('id', 'desc')
                ->limit(8)
                ->get();

        $p = DB::table('produk')
                ->select('produk.*')
                ->join('usaha','usaha.id','=','produk.usaha_id')
                ->where('usaha.terverifikasi', 1)
                ->orderBy('produk.created_at', 'desc')
                ->limit(8)
                ->get();

        return view('home', ['usaha'=>$u, 'produk'=>$p]);
    }

    public function about()
    {
        return view('about');
    }

    public function cari($keyword)
    {
        $u = DB::table('usaha')
                ->distinct()
                ->select('usaha.id','users.nama','users.username','users.avatar')
                ->join('users','users.id','=','usaha.user_id')
                ->join('produk','produk.usaha_id','=','usaha.id')
                ->where('usaha.terverifikasi', 1)
                ->where('produk.nama','LIKE','%'.$keyword.'%')
                ->get();
        // $u = Usaha::where('terverifikasi',1)
        //         ->orderBy('id', 'desc')
        //         ->get();
        $pa = [];

        foreach ($u as $uu => $uv) {
            $p = DB::table('produk')
                ->select('produk.*')
                ->join('usaha','usaha.id','=','produk.usaha_id')
                ->where('usaha.terverifikasi', 1)
                ->where('usaha.id','=',$uv->id)
                ->where('produk.nama','LIKE','%'.$keyword.'%')
                ->get();
            
            array_push($pa,$p);
        }
        //print_r($pa);
        // foreach ($pa as $key => $p) {
        //     foreach ($p as $key => $pp) {
        //         echo $pp->gambar.'<br>';
        //     }
        //     echo '<br>';
        // }
        return view('cari', ['usaha'=>$u,'produk'=>$pa, 'keyword'=>$keyword]);
    }

    public function getProdukCari($username, $keyword)
    {
        $p = DB::table('produk')
                ->select('produk.*')
                ->join('users','users.id','=','usaha.user_id')
                ->join('produk','produk.usaha_id','=','usaha.id')
                ->where('usaha.terverifikasi', 1)
                ->where('users.username','=',$username)
                ->where('produk.nama','LIKE','%'.$keyword.'%')
                ->get();
        // $u = Usaha::where('terverifikasi',1)
        //         ->orderBy('id', 'desc')
        //         ->get();

        return view('cariproduct', ['produk'=>$p, 'u'=>$username]);
    }

    public function postCari(Request $request)
    {
        return redirect('/cari/'.$request->keyword);
    }
}
