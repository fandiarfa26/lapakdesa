@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <!-- breadcrumb-->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
                    <li aria-current="page" class="breadcrumb-item active">Profil</li>
                </ol>
            </nav>
        </div>
        <div class="col-lg-3">
            <!--
            *** CUSTOMER MENU ***
            _________________________________________________________
            -->
            <div class="card sidebar-menu">
                <div class="card-header">
                    <h3 class="h4 card-title">Menu</h3>
                </div>
                <div class="card-body">
                    <ul class="nav nav-pills flex-column">
                        <a href="{{ url('/transaksi') }}" class="nav-link">
                            <i class="fa fa-list"></i> Pesanan Saya
                        </a>
                        <a href="{{ url('/profil') }}" class="nav-link active">
                            <i class="fa fa-user"></i> Profil Saya
                        </a>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"
                            class="nav-link">
                            <i class="fa fa-sign-out"></i> Keluar
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </a>
                    </ul>
                </div>
            </div>
            <!-- /.col-lg-3-->
            <!-- *** CUSTOMER MENU END ***-->
        </div>
        <div id="customer-orders" class="col-lg-9">
            <div class="box row">
                <div class="col-lg-3">
                    <img src="{{ asset('storage/images/user/'.$user->avatar) }}" alt="" class="img-fluid">
                </div>
                <div class="col-lg-9">
                    <h1>{{ $user->nama }}</h1>
                    <h5 class="text-secondary">({{ $user->username }}) <button type="button" id="btn_edit" class="btn btn-link"> <i class="fa fa-pencil"></i>Ubah Profil</a></h5>
                    <div class="row">
                        <div class="col-sm-4">
                            <h5>Alamat</h5>
                            <p class="text-secondary">{{ $user->alamat }}</p>
                        </div>
                        <div class="col-sm-4">
                            <h5>Nomor HP</h5>
                            <p class="text-secondary">{{ $user->no_hp }}</p>
                        </div>
                        <div class="col-sm-4">
                            <h5>Email</h5>
                            <p class="text-secondary">{{ $user->email }}</p>
                        </div>
                    </div>

                </div>

                <div id="form_edit" class="col-lg-12" style="display:none">
                    <hr>
                    <h3>Ubah Profil</h3>
                    <form action="/profil" method="post">
                        @method('patch')
                        @csrf

                        <div class="form-group">
                                <label for="nama">{{ __('Nama') }}</label>
    
                                <input id="nama" type="text" class="form-control{{ $errors->has('nama') ? ' is-invalid' : '' }}" name="nama" value="{{ $user->nama }}" required >
    
                                @if ($errors->has('nama'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nama') }}</strong>
                                    </span>
                                @endif
                            </div>
    
                            <div class="form-group">
                                <label for="username">{{ __('Username') }}</label>
    
                                    <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ $user->username }}" required >
    
                                    @if ($errors->has('username'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('username') }}</strong>
                                        </span>
                                    @endif
                            </div>
    
                            <div class="form-group">
                                <label for="email">{{ __('E-Mail') }}</label>
    
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $user->email }}" required>
    
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
    
                            <div class="form-group">
                                <label for="alamat">Alamat</label><br>
                                <textarea class="form-control{{ $errors->has('alamat') ? ' is-invalid' : '' }}" name="alamat" id="alamat" cols="30" rows="10" required>{{ $user->alamat }}</textarea>
                                @if ($errors->has('alamat'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('alamat') }}</strong>
                                    </span>
                                @endif
                            </div>
    
                            <div class="form-group">
                                <label for="no_hp">Nomor HP</label><br>
                                <input type="text" class="form-control{{ $errors->has('no_hp') ? ' is-invalid' : '' }}" id="no_hp" name="no_hp" required value="{{ $user->no_hp }}">
                                @if ($errors->has('no_hp'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('no_hp') }}</strong>
                                    </span>
                                @endif
                            </div>
    
                            <div class="form-group">
                                <label for="password">{{ __('Password') }}</label>
    
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
    
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
    
                            <div class="form-group mb-0">
                                <button type="button" class="btn btn-default" id="btn_batal">Batal</button>
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Ubah') }}
                                    </button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<script >
    $(document).ready(function(){
        $('#btn_edit').click(function() {
            $('#form_edit').show('slow');
        });

        $('#btn_batal').click(function() {
            $('#form_edit').hide('slow');
        });
    })
</script>

@endsection
