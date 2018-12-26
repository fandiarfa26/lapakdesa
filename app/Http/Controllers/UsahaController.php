<?php

namespace App\Http\Controllers;

use App\Usaha;
use App\Produk;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsahaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $u = Usaha::where('terverifikasi', 1)->get();

        return view('usaha', ['usaha'=>$u]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($username)
    {
        $u = DB::table('usaha')
                    ->select('usaha.id as usaha_id','usaha.*','users.*')
                    ->join('users','users.id','=','usaha.user_id')
                    ->where('users.username', $username)
                    ->where('terverifikasi', 1)
                    ->first();
        // return response()->json(['data'=>$u]);
        $p = Produk::where('usaha_id', $u->usaha_id)
                    ->where('aktif', 1)
                    ->get();
        
        return view('detail_usaha',['usaha'=>$u, 'produk'=>$p]);
    }

    
}
