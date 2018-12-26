<?php

namespace App\Http\Controllers\Usaha;

use App\Usaha;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class UsahaController extends Controller
{

    public function show()
    {
        $p = DB::table('usaha')
                    ->select('usaha.*','users.*')
                    ->join('users','users.id','=','usaha.user_id')
                    ->where('usaha.user_id','=', Auth::user()->id)
                    ->first();

        return view('panelUsaha.profil', ['profil'=>$p]);
    }

    public function edit()
    {
        $p = DB::table('usaha')
                    ->select('usaha.*','users.*')
                    ->join('users','users.id','=','usaha.user_id')
                    ->where('usaha.user_id','=', Auth::user()->id)
                    ->first();

        return view('panelUsaha.edit_profil', ['profil'=>$p]);
    }

    public function update(Request $request)
    {
        $v = Validator::make($request->all(), [
            'nama' => 'required',
            'username' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'deskripsi' => 'required',
            'password' => 'required'
        ]);
        if ($v->fails())
        {
            return response()->json([
                'status' => 'error',
                'errors' => $v->errors()
            ], 422);
        }

        
        if ($request->file('avatar') == null){
            $filename = Auth::user()->avatar;
        }else{
            $file = $request->file('avatar');
            $filename = 'usaha-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/images/user', $filename);
        }

        $usaha = Usaha::where('user_id', Auth::user()->id)
                    ->update([
                        'deskripsi' => $request->deskripsi,
                        'desa' => 'sumbersekar',
                        'terverifikasi' => 0
                    ]);
        
        $user = User::find(Auth::user()->id)
                    ->update([
                        'nama' => $request->nama,
                        'alamat' => $request->alamat,
                        'no_hp' => $request->no_hp,
                        'username' => $request->username,
                        'email' => $request->email,
                        'avatar' => $filename
                    ]);

        
        swal()->position('top-right')->autoclose(3000)->toast()->success('Berhasil Update Data!');
        

        return redirect('/p_usaha/profil');
    }
}
