@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row">
          <div class="col-md-12">
            <div id="main-slider" class="owl-carousel owl-theme">
              <div class="item"><img src="{{ asset('images/slide-1.jpg') }}" alt="" class="img-fluid"></div>
              <div class="item"><img src="{{ asset('images/slide-2.jpg') }}" alt="" class="img-fluid"></div>
              <div class="item"><img src="{{ asset('images/slide-3.jpg') }}" alt="" class="img-fluid"></div>
            </div>
            <!-- /#main-slider-->
          </div>
        </div>
      </div>
      <!--
      *** ADVANTAGES HOMEPAGE ***
      _________________________________________________________
      -->
      {{-- <div id="advantages">
        <div class="container">
          <div class="row mb-4">
            <div class="col-md-4">
              <div class="box clickable d-flex flex-column justify-content-center mb-0 h-100">
                <div class="icon"><i class="fa fa-heart"></i></div>
                <h3><a href="#">We love our customers</a></h3>
                <p class="mb-0">We are known to provide best possible service ever</p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="box clickable d-flex flex-column justify-content-center mb-0 h-100">
                <div class="icon"><i class="fa fa-tags"></i></div>
                <h3><a href="#">Best prices</a></h3>
                <p class="mb-0">You can check that the height of the boxes adjust when longer text like this one is used in one of them.</p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="box clickable d-flex flex-column justify-content-center mb-0 h-100">
                <div class="icon"><i class="fa fa-thumbs-up"></i></div>
                <h3><a href="#">100% satisfaction guaranteed</a></h3>
                <p class="mb-0">Free returns on everything for 3 months.</p>
              </div>
            </div>
          </div>
          <!-- /.row-->
        </div>
        <!-- /.container-->
      </div> --}}
      <!-- /#advantages-->
      <!-- *** ADVANTAGES END ***-->
      <!--
      *** HOT PRODUCT SLIDESHOW ***
      _________________________________________________________
      -->
      <div id="hot">
        <div class="box py-4">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <h2 class="mb-0">Berbagai Lapak Baru</h2>
              </div>
            </div>
          </div>
        </div>
        <div class="container">
          <div class="product-slider owl-carousel owl-theme">
            
            @foreach ($usaha as $u)
                
            
            <div class="item">
              <div class="product">
                <div class="flip-container">
                  <div class="flipper">
                      <div class="front"><a href="{{ url('/lapak/'.$u->user->username) }}"><img src="{{ asset('storage/images/user/'.$u->user->avatar) }}" alt="" class="img-fluid"></a></div>
                  </div>
                </div><a href="{{ url('/lapak/'.$u->user->username) }}" class="invisible"><img src="{{ asset('storage/images/user/'.$u->user->avatar) }}" alt="" class="img-fluid"></a>
                <div class="text">
                    <h3><a href="{{ url('/lapak/'.$u->user->username) }}">{{ $u->user->nama }}</a></h3>
                  {{-- <p class="price"> 
                    <del></del>$143.00
                  </p> --}}
                </div>
                <!-- /.text-->
                {{-- <div class="ribbon sale">
                  <div class="theribbon">SALE</div>
                  <div class="ribbon-background"></div>
                </div>
                <!-- /.ribbon-->
                <div class="ribbon new">
                  <div class="theribbon">NEW</div>
                  <div class="ribbon-background"></div>
                </div> --}}
                <!-- /.ribbon-->
              </div>
              <!-- /.product-->
            </div>
            @endforeach
            
            <!-- /.product-slider-->
          </div>
          <!-- /.container-->
        </div>
        <!-- /#hot-->
        <!-- *** HOT END ***-->
      </div>
      
      <div id="hot">
          <div class="box py-4">
            <div class="container">
              <div class="row">
                <div class="col-md-12">
                  <h2 class="mb-0">Berbagai Produk Baru</h2>
                </div>
              </div>
            </div>
          </div>
          <div class="container">
            <div class="product-slider owl-carousel owl-theme">
              
              @foreach ($produk as $p)
                  
              <div class="item">
                  <div class="product">
                      <div class="flip-container">
                          <div class="flipper">
                          <div class="front"><a href="{{ url('/produk/'.$p->id) }}"><img src="{{ asset('storage/images/produk/'.$p->gambar.'-1.png') }}" alt="" class="img-fluid"></a></div>
                          </div>
                      </div><a href="{{ url('/produk/'.$p->id) }}" class="invisible"><img src="{{ asset('storage/images/produk/'.$p->gambar.'-1.png') }}" alt="" class="img-fluid"></a>
                      <div class="text">
                          <h3><a href="{{ url('/produk/'.$p->id) }}">{{ $p->nama }}</a></h3>
                          <p class="price">
                              Rp {{ $p->harga }}
                          </p>
                      </div>
                      <!-- /.text-->
                  </div>
                <!-- /.product-->
              </div>
              @endforeach
              
              <!-- /.product-slider-->
            </div>
            <!-- /.container-->
          </div>
          <!-- /#hot-->
          <!-- *** HOT END ***-->
        </div>
      
@endsection
