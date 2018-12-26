<?php

namespace App\Http\Controllers\Usaha;

use App\Usaha;
use App\User;
use App\Produk;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
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
        $produk = Produk::where('usaha_id', Auth::user()->usaha->id)->get();
        
        return view('panelUsaha.tabel_produk', ['produk'=>$produk]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('panelUsaha.form_produk');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $v = Validator::make($request->all(), [
            'nama' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        if ($v->fails())
        {
            return response()->json([
                'status' => 'error',
                'errors' => $v->errors()
            ], 422);
        }
        $produk = new Produk;
        $produk->nama = $request->nama;
        $produk->harga = $request->harga;
        $produk->deskripsi = $request->deskripsi;
        $produk->usaha_id = Auth::user()->usaha->id;
        
        
        $file = $request->file('gambar');
        $filename = 'produk-' . time() . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs('public/images/produk', $filename);
        $produk->gambar = $filename;

        if ($produk->save()){
            swal()->position('top-right')->autoclose(3000)->toast()->success('Berhasil Tambah Produk!');
        }else{
            swal()->position('top-right')->autoclose(3000)->toast()->error('Gagal Tambah Produk!');
        }

        return redirect('/p_usaha/produk');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produk = Produk::findOrFail($id);
        
        return view('panelUsaha.detail_produk', ['produk'=>$produk]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        
        return view('panelUsaha.form_edit_produk', ['produk' => $produk]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $v = Validator::make($request->all(), [
            'nama' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required'
        ]);
        if ($v->fails())
        {
            return response()->json([
                'status' => 'error',
                'errors' => $v->errors()
            ], 422);
        }
        $produk = Produk::find($id);
        $produk->nama = $request->nama;
        $produk->harga = $request->harga;
        $produk->deskripsi = $request->deskripsi;

        if($request->file('gambar') != null){
            $file = $request->file('gambar');
            $filename = 'produk-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/images/produk', $filename);
            $produk->gambar = $filename;
        }

        if ($produk->save()){
            swal()->position('top-right')->autoclose(3000)->toast()->success('Berhasil Update Data Produk!');
        }else{
            swal()->position('top-right')->autoclose(3000)->toast()->error('Gagal Update Data Produk!');
        }

        return redirect('/p_usaha/produk');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);
        if ($produk->delete()){
            swal()->position('top-right')->autoclose(3000)->toast()->success('Berhasil Hapus Produk!');
        }else{
            swal()->position('top-right')->autoclose(3000)->toast()->error('Gagal Hapus Produk!');
        }

        return redirect('/p_usaha/produk');
    }
}
