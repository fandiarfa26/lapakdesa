<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $user = User::findOrFail(Auth::user()->id);

        return view('profil', ['user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $v = Validator::make($request->all(), [
            'nama' => 'required',
            'username' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required'
        ]);
        if ($v->fails())
        {
            return response()->json([
                'status' => 'error',
                'errors' => $v->errors()
            ], 422);
        }
        
        $user = User::find(Auth::user()->id);
        $user->nama = $request->nama;
        $user->alamat = $request->alamat;
        $user->no_hp = $request->no_hp;
        if ($user->save()){
            swal()->position('top-right')->autoclose(3000)->toast()->success('Berhasil Ubah Data Profil!');
        }else{
            swal()->position('top-right')->autoclose(3000)->toast()->error('Gagal Ubah Data Profil!');
        }

        return back();
    }

    
}
