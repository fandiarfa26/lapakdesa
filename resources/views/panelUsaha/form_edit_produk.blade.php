@extends('layouts.appUsaha')

@section('content')
<div class="page-header">
    <h3 class="page-title">
        Produk
    </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/p_usaha/produk') }}">Produk</a></li>
        <li class="breadcrumb-item active" aria-current="page">Form Produk</li>
        </ol>
    </nav>
</div>
<div class="row">
<div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Edit Produk</h4>
            <form action="/p_usaha/produk/{{$produk->id}}" method="post"  class="forms-sample row" enctype="multipart/form-data">
                    @method('patch')
                @csrf
                <div class="col-lg-3">
                    <div class="form-group" id="input_gambar">
                        <label for="gambar">Gambar Produk (optional)</label>
                        <input type="file" class="form-control" name="gambar" id="gambar">
                      </div>
                </div>
                <div class="col-lg-9">
                    <div class="form-group">
                        <label for="nama">Nama Produk</label>
                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Produk" value="{{$produk->nama}}" required>
                      </div>
                      <div class="form-group">
                        <label for="deskripsi">Deskripsi Produk</label>
                        <textarea class="form-control" name="deskripsi" id="deskripsi" cols="30" rows="10">{{$produk->deskripsi}}</textarea>
                        </div>
                      <div class="form-group">
                            <label for="harga">Harga Produk</label>
                            <input class="form-control" type="text" name="harga" id="harga" value="{{$produk->harga}}" required>
                      </div>
                      <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
                      <a href="{{ url('/p_usaha/produk') }}" class="btn btn-light">Cancel</a>
                </div>
              
              
              
              
            </form>
          </div>
        </div>
      </div>
    </div>

    <script>
        $(document).ready(function() {
        function filePreview(input) {
          if(input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
              $('#input_gambar + img').remove();
              $('#input_gambar').after('<label>Preview</label><br><img src="'+e.target.result+'" class="img-fluid">');
            }
            reader.readAsDataURL(input.files[0]);
          }
        }
  
        $('#gambar').change(function() {
          filePreview(this);
        });
      })
      </script>

@endsection

