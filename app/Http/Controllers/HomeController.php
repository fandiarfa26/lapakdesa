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
}
