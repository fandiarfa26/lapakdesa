<div class="box row">
  <div class="col-lg-9">
    <h2>{{ $produk->nama }}</h2>
      
    <h4>Deskripsi</h4>
    <p>{{$produk->deskripsi}}</p>
    <h4>Harga</h4>
    <p class="h1">Rp {{ $produk->harga }}</p>
  </div>
  <div class="col-lg-3">
      <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modalGambar">
          <i class="fa fa-image"></i>
          Lihat Gambar
        </button>
  </div>
</div>

<form action="{{ url('/cart/'.$produk->id) }}" method="post">
  @csrf
<div class="row">
    <div class="col-lg-6">
        <div class="form-group">
            <input type="number" name="jmlbeli" min=1  id="jmlbeli" class="form-control form-control-lg" placeholder="Masukkan Jumlah Beli">
        </div>
    </div>
    <div class="col-lg-6">
        <button type="submit" class="btn btn-primary btn-block btn-lg">
          <i class="fa fa-shopping-cart"></i> BELI
        </a>
    </div>
</div>
</form>



  
  <!-- Modal -->
  <div class="modal fade" id="modalGambar" tabindex="-1" role="dialog" aria-labelledby="modalGambarLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
        
        <div class="modal-body" align="center">
          <div class="row">
            <div class="col-lg-10">
                {{-- <img id="photoz" src="{{ asset('storage/images/produk/'.$produk->gambar) }}" alt="" class="img-fluid"> --}}
                <div data-slider-id="1" class="owl-carousel imgpreview-carousel">
                  @for ($i = 1; $i <= 4; $i++)
                    @if (!file_exists('storage/images/produk/'.$produk->gambar.'-'.$i.'.png'))
                        @break
                    @endif
                    <div class="item"> <img src="{{ asset('storage/images/produk/'.$produk->gambar.'-'.$i.'.png') }}" alt="" class="img-fluid"></div>
                  @endfor
                </div>
            </div>
            <div class="col-lg-2">
                <div data-slider-id="1" class="owl-thumbs">
                    @for ($i = 1; $i <= 4; $i++)
                      @if (!file_exists('storage/images/produk/'.$produk->gambar.'-'.$i.'.png'))
                        @break
                      @endif
                      <button class="owl-thumb-item"><img src="{{ asset('storage/images/produk/'.$produk->gambar.'-'.$i.'.png') }}" alt="" class="img-fluid"></button>
                    @endfor
                  </div>
              {{-- <button class="btn btn-lg btn-block btn-light" onclick="showimage()">
                  <i class="fa fa-image"></i>
              </button>
              <a style="cursor:pointer;" align="center"  onclick="show360()">
                <img src="{{ asset('storage/images/web/360.png') }}" alt="" class="img-fluid">
              </a> --}}
            </div>
          </div>
          
          
        </div>
        
      </div>
    </div>
  </div>
  <script>
  $('.imgpreview-carousel').owlCarousel({
        items: 1,
        thumbs: true,
        nav: false,
        dots: false,
        loop: true,
        thumbsPrerendered: true
    });
  </script>