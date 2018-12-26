<?php

namespace App\Http\Controllers\Usaha;

use App\Produk;
use Auth;
use App\Transaksi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $p = count(Produk::where('usaha_id',Auth::user()->usaha->id)->get());

        $t = Transaksi::where('usaha_id',Auth::user()->usaha->id)->sum('total_biaya');
        return view('panelUsaha.dashboard',['p'=>$p,'t'=>$t]);
    }
}
