<?php

namespace App\Http\Controllers\Admin;


use App\Usaha;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class UsahaController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $usaha = DB::table('usaha')
        //             ->select('usaha.*','users.*')
        //             ->join('users','users.id','=','usaha.user_id')
        //             ->get();

        $usaha = Usaha::all();

        return view('panelAdmin.tabel_usaha', ['usaha'=>$usaha]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $usaha = DB::table('usaha')
        //             ->select('usaha.*','users.*')
        //             ->join('users','users.id','=','usaha.user_id')
        //             ->where('usaha.id','=',$id)
        //             ->first();

        $usaha = Usaha::findOrFail($id);

        return view('panelAdmin.detail_usaha', ['usaha'=>$usaha]);
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $usaha = Usaha::findOrFail($id);

        if($usaha->terverifikasi == 0){
            $usaha->terverifikasi = 1;
        }else{
            $usaha->terverifikasi = 0;
        }

        if ($usaha->save()){
            swal()->position('top-right')->autoclose(3000)->toast()->success('Berhasil Update Data!');
        }else{
            swal()->position('top-right')->autoclose(3000)->toast()->error('Gagal Update Data!');
        }
        
        return back();
    }
}
