@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <!-- breadcrumb-->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('/lapak') }}">Lapak</a></li>
                    <li aria-current="page" class="breadcrumb-item active">{{ $usaha->nama }}</li>
                </ol>
            </nav>

            <div class="row">
                <div class="col-lg-3">
                    <div class="box">
                        <div class="row">
                            <div class="col-lg-12">
                                <img src="{{ asset('storage/images/user/'.$usaha->avatar) }}" alt="" class="img-fluid">
                            </div>
                            <div class="col-lg-12">
                                <hr>
                                <h2>{{ $usaha->nama }}</h2>
                                <h5 class="text-secondary">({{ $usaha->username }})</h5>
                                <p>{{ $usaha->deskripsi }}</p>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h5>Alamat</h5>
                                        <p class="text-secondary">{{ $usaha->alamat }}</p>
                                    </div>
                                    <div class="col-sm-12">
                                        <h5>Nomor HP</h5>
                                        <p class="text-secondary">{{ $usaha->no_hp }}</p>
                                    </div>
                                    <div class="col-sm-12">
                                        <h5>Email</h5>
                                        <p class="text-secondary">{{ $usaha->email }}</p>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-9">
                    <div class="box">
                        
                        <div class="product-slider owl-carousel">
                            @foreach ($produk as $p)
                            <div class="item">
                                <div>
                                    <a style="cursor:pointer;" onclick="loadDeskripsiProduk({{ $p->id }});">
                                        <img src="{{ asset('storage/images/produk/'.$p->gambar.'-1.png') }}" alt="" class="img-fluid"  style="padding-right: 10px;">
                                    </a>
                                    <!-- /.text-->
                                </div>
                                <!-- /.product-->
                            </div>
                            @endforeach
                            <!-- /.product-slider-->
                        </div>
                        <p class="text-black-50"><em>(geser untuk melihat produk)</em></p>
                        <hr>
                        <button id="loading" class="btn btn-primary btn-sm" type="button" disabled style="display:none;">
                            Loading...
                        </button>
                        <div id="desc_product">
                            <p class="text-black-50"><em>Klik gambar produk untuk melihat deskripsi produk tersebut.</em></p>
                            
                        </div>
                        <div class="row">
                            
                        </div>
                    </div>
                    
                    
                </div>
            </div>
        </div>
        <!-- /.col-lg-9-->
    </div>
</div>

<script>
    function loadDeskripsiProduk(id)
    {
        $('#loading').show();
        $.ajax({
            url: '/produk/'+id,
            success: function(result) {
                $('#loading').hide();
                $('#desc_product').html(result);
            },
            error: function(xhr){
                $('#loading').hide();
                alert('error');
            }
        })
    }
</script>
@endsection
