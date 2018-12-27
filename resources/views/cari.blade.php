@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <!-- breadcrumb-->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
                <li aria-current="page" class="breadcrumb-item active">Cari Produk</li>
                </ol>
            </nav>
            
            {{-- <div class="box info-bar">
                    <div class="row">

                        <div class="col-md-12 col-lg-4 products-showing">Pencarian produk dengan kata kunci : <b><em>{{ $keyword }}</em></b></div>
                            
                    </div>
                <div class="row">

                    <div class="col-md-12 col-lg-4 products-showing">Terdapat <strong>{{count($produk)}}</strong> produk</div>
                    
                </div>
            </div> --}}

            <div class="products">
                
                @forelse ($usaha as $k=>$u)
                <div class="row">
                        <div class="col-lg-2">
                            <div class="box">
                                <div class="row">
                                    <div class="col-lg-12">
                                    <a href="{{ url('/lapak/'.$u->username) }}" title="{{ $u->nama}}">
                                            <img src="{{ asset('storage/images/user/'.$u->avatar) }}" alt="" class="img-fluid">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
        
                        <div class="col-lg-10">
                            <div class="box">
                                
                                <div class="product-slider owl-carousel">
                                    
                                    

                                        @foreach ($produk[$k] as $p)
    

                                        <div class="item" >
                                        <a href="{{ url('/lapak/'.$u->username) }}">
                                            <img src="{{ asset('storage/images/produk/'.$p->gambar.'-1.png') }}" alt="" class="img-fluid"  style="padding-right: 10px;">
                                        </a>
                                        </div>
                                        @endforeach
                                        
                                </div>
                                
                            </div>
                            
                            
                        </div>
                    </div>
                @empty
                
                @endforelse
                
                
                <!-- /.products-->
            </div>
            {{-- <div class="pages">
                <p class="loadMore"><a href="#" class="btn btn-primary btn-lg"><i class="fa fa-chevron-down"></i> Load
                        more</a></p>
                <nav aria-label="Page navigation example" class="d-flex justify-content-center">
                    <ul class="pagination">
                        <li class="page-item"><a href="#" aria-label="Previous" class="page-link"><span aria-hidden="true">«</span><span
                                    class="sr-only">Previous</span></a></li>
                        <li class="page-item active"><a href="#" class="page-link">1</a></li>
                        <li class="page-item"><a href="#" class="page-link">2</a></li>
                        <li class="page-item"><a href="#" class="page-link">3</a></li>
                        <li class="page-item"><a href="#" class="page-link">4</a></li>
                        <li class="page-item"><a href="#" class="page-link">5</a></li>
                        <li class="page-item"><a href="#" aria-label="Next" class="page-link"><span aria-hidden="true">»</span><span
                                    class="sr-only">Next</span></a></li>
                    </ul>
                </nav>
            </div> --}}
        </div>
        <!-- /.col-lg-9-->
    </div>
</div>
@endsection
