@extends('layouts.appUsaha')

@section('content')
<div class="page-header">
    <h3 class="page-title">
        Profil
    </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/p_usaha/profil') }}">Profil</a></li>
        <li class="breadcrumb-item active" aria-current="page">Form Profil</li>
        </ol>
    </nav>
</div>
<div class="row">
<div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Edit Profil</h4>
            <form action="/p_usaha/profil" method="post"  class="forms-sample row" enctype="multipart/form-data">
                @method('patch')
                @csrf
                <div class="col-lg-3">
                    <div class="form-group" id="input_gambar">
                        <label for="avatar">Foto Profil (Optional)</label>
                        <input type="file" class="form-control" name="avatar" id="gambar">
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="{{$profil->nama}}" required>
                      </div>
                      <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea class="form-control" name="deskripsi" id="deskripsi" cols="30" rows="10">{{$profil->deskripsi}}</textarea>
                        </div>
                        <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control" name="alamat" id="alamat" cols="30" rows="10">{{$profil->alamat}}</textarea>
                        </div>
                      <div class="form-group">
                            <label for="no_hp">Nomor HP</label>
                            <input class="form-control" type="text" name="no_hp" id="no_hp" value="{{$profil->no_hp}}" required>
                      </div>
                      <div class="form-group">
                          <label for="email">Email</label>
                          <input class="form-control" type="email" name="email" id="email" value="{{$profil->email}}" required>
                      </div>
                      <div class="form-group">
                            <label for="username">Username</label>
                            <input class="form-control" type="text" name="username" id="username" value="{{$profil->username}}" required>
                      </div>
                      <div class="form-group">
                            <label for="password">Konfirmasi</label>
                            <input class="form-control" type="password" name="password" id="password" required placeholder="Masukkan password untuk konfirmasi edit">
                      </div>
                      <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
                      <a href="{{ url('/p_usaha/profil') }}" class="btn btn-light">Cancel</a>
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

