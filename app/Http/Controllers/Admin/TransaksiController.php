<?php

namespace App\Http\Controllers\Admin;

use App\Transaksi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksi = Transaksi::all();
        
        return view('panelAdmin.tabel_transaksi', ['transaksi'=>$transaksi]);
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaksi = Transaksi::find($id);
        
        return view('panelAdmin.detail_transaksi', ['t'=>$transaksi]);
    }

    public function bayar($id)
    {
        $t = Transaksi::findOrFail($id);
        if($t->status_bayar == 0){
            $t->status_bayar = 1;
        }else{
            $t->status_bayar = 0;
        }
        
        if ($t->save()){
            swal()->position('top-right')->autoclose(3000)->toast()->success('Berhasil Update Data!');
        }else{
            swal()->position('top-right')->autoclose(3000)->toast()->error('Gagal Update Data!');
        }

        return back();
        //return response()->json(['status'=>'success']);
    }

    public function kirim($id, $status)
    {
        $t = Transaksi::findOrFail($id);
        $t->status_kirim = $status;
        if ($t->save()){
            swal()->position('top-right')->autoclose(3000)->toast()->success('Berhasil Update Data!');
        }else{
            swal()->position('top-right')->autoclose(3000)->toast()->error('Gagal Update Data!');
        }
        
        return back();
    }
}
