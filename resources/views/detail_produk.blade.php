@extends('layouts.app')

@section('content')

<div class="container">
        <div class="row">
          <div class="col-lg-12">
            <!-- breadcrumb-->
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
                <li class="breadcrumb-item"><a href="{{ url('/produk') }}">Produk</a></li>
                <li aria-current="page" class="breadcrumb-item active">{{ $produk->nama }}</li>
              </ol>
            </nav>
          </div>
          <div class="col-lg-12">
            <div id="productMain" class="row">
              <div class="col-md-5">
                <div data-slider-id="1" class="owl-carousel shop-detail-carousel">
                    <div class="item"> <img src="{{ asset('storage/images/produk/'.$produk->gambar) }}" alt="" class="img-fluid"></div>
                </div>
                {{-- <div class="ribbon sale">
                  <div class="theribbon">SALE</div>
                  <div class="ribbon-background"></div>
                </div>
                <!-- /.ribbon-->
                <div class="ribbon new">
                  <div class="theribbon">NEW</div>
                  <div class="ribbon-background"></div>
                </div>
                <!-- /.ribbon--> --}}
              </div>
              <div class="col-md-7">
                <div class="box">
                    <h1 class="text-center">{{ $produk->nama }}</h1>
                  <p class="goToDescription"><a href="#details" class="scroll-to">Scroll ke Deskripsi Produk</a></p>
                    <p class="price">Rp {{ $produk->harga }}</p>
                <p class="text-center buttons"><a href="{{ url('/produk/'.$produk->id.'/beli') }}" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Beli</a></p>
                </div>
                {{-- <div data-slider-id="1" class="owl-thumbs">
                  <button class="owl-thumb-item"><img src="img/detailsquare.jpg" alt="" class="img-fluid"></button>
                  <button class="owl-thumb-item"><img src="img/detailsquare2.jpg" alt="" class="img-fluid"></button>
                  <button class="owl-thumb-item"><img src="img/detailsquare3.jpg" alt="" class="img-fluid"></button>
                </div> --}}
                <div id="details" class="box">
                        <p></p>
                        <h4>Deskripsi Produk</h4>
                      <p>{{$produk->deskripsi}}</p>
                        
                        {{-- <hr>
                        <div class="social">
                          <h4>Show it to your friends</h4>
                          <p><a href="#" class="external facebook"><i class="fa fa-facebook"></i></a><a href="#" class="external gplus"><i class="fa fa-google-plus"></i></a><a href="#" class="external twitter"><i class="fa fa-twitter"></i></a><a href="#" class="email"><i class="fa fa-envelope"></i></a></p>
                        </div> --}}
                      </div>
              </div>
            </div>
            
            @if (count($produklain) > 0)
                <div class="row same-height-row">
                    <div class="col-lg-12 col-md-12">
                            <h4>Produk Lainnya di <a href="{{ url('/usaha/'.$produk->usaha->user->username) }}">{{ $produk->usaha->user->nama }}</a></h4>
                            <hr>
                    </div>
                    
                    @foreach ($produklain as $pl)
                        <div class="col-lg-3 col-md-6">
                                <div class="product same-height">
                                    <div class="flip-container">
                                        <div class="flipper">
                                        <div class="front"><a href="{{ url('/produk/'.$pl->id) }}"><img src="{{ asset('storage/images/produk/'.$pl->gambar) }}" alt="" class="img-fluid"></a></div>
                                        </div>
                                    </div><a href="{{ url('/produk/'.$pl->id) }}" class="invisible"><img src="{{ asset('storage/images/produk/'.$pl->gambar) }}" alt="" class="img-fluid"></a>
                                    <div class="text">
                                        <h3><a href="{{ url('/produk/'.$pl->id) }}">{{ $pl->nama }}</a></h3>
                                        <p class="price">
                                            Rp {{ $pl->harga }}
                                        </p>
                                    </div>
                                    <!-- /.text-->
                                </div>
                            <!-- /.product-->
                        </div>    
                    @endforeach
                </div>
            @endif
            
          </div>
          <!-- /.col-md-9-->
        </div>
      </div>
    
@endsection