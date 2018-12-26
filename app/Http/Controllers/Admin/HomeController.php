<?php

namespace App\Http\Controllers\Admin;

use App\Usaha;
use App\Produk;
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
        $this->middleware(['auth','is_admin']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $u = count(Usaha::all());
        $p = count(Produk::all());
        $t = Transaksi::all()->sum('total_biaya');
        return view('panelAdmin.dashboard',['u'=>$u,'p'=>$p,'t'=>$t]);
    }
}
