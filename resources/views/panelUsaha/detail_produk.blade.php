@extends('layouts.appUsaha')

@section('content')
<div class="page-header">
    <h3 class="page-title">
        Produk
    </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/p_usaha/produk') }}">Produk</a></li>
        <li class="breadcrumb-item active" aria-current="page">Detail Produk</li>
        </ol>
    </nav>
</div>
<div class="row">
        <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Detail</h4>
                    
                  </div>
                  <div class="card-body">
                        <div class="row">
                                <div class="col-md-3">
                                    <img src="{{ asset('storage/images/produk/'.$produk->gambar.'-1.png') }}" class="img-fluid" alt="Responsive image">
                                </div>
                            <div class="col-md-9">
                                <h5 class="font-weight-bold">Nama:</h5>
                                <p>{{$produk->nama}}</p>
                                <h5 class="font-weight-bold">Deskripsi:</h5>
                                <p>{{$produk->deskripsi}}</p>
                                <h5 class="font-weight-bold">Harga</h5>
                                <p>{{$produk->harga}}</p>
                          </div>
                        </div>
                  </div>
                </div>
              </div>
</div>

@endsection

