@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-12">
        <!-- breadcrumb-->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
            <li aria-current="page" class="breadcrumb-item active">Daftar Akun</li>
            </ol>
        </nav>
        </div>
        <div class="col-lg-6 offset-lg-3">
            <div class="box">
                <h1>Akun Baru</h1>
                <p class="lead">Belum memiliki akun?</p>
                <p>Silahkan masukkan semua data yang telah tersedia dengan valid, serta pilihlah ingin daftar sebagai pengguna baru atau usaha baru!</p>
                <hr>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="form-group row">
                        <label for="role" class="col-md-2 col-form-label">Daftar</label>
                        <div class="col-md-6">
                            <select name="role" class="form-control">
                                <option value="1">Pengguna Baru</option>
                                <option value="3">Usaha Baru</option>
                            </select>
                        </div>
                    </div>

                        <div class="form-group">
                            <label for="nama">{{ __('Nama') }}</label>

                            <input id="nama" type="text" class="form-control{{ $errors->has('nama') ? ' is-invalid' : '' }}" name="nama" value="{{ old('nama') }}" required autofocus>

                            @if ($errors->has('nama'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('nama') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="username">{{ __('Username') }}</label>

                                <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus>

                                @if ($errors->has('username'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group">
                            <label for="email">{{ __('E-Mail') }}</label>

                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="alamat">Alamat</label><br>
                            <textarea class="form-control{{ $errors->has('alamat') ? ' is-invalid' : '' }}" name="alamat" id="alamat" cols="30" rows="10" required>{{ old('alamat') }}</textarea>
                            @if ($errors->has('alamat'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('alamat') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="no_hp">Nomor HP</label><br>
                            <input type="text" class="form-control{{ $errors->has('no_hp') ? ' is-invalid' : '' }}" id="no_hp" name="no_hp" required value="{{ old('no_hp') }}">
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

                        <div class="form-group">
                            <label for="password-confirm">{{ __('Konfirmasi Password') }}</label>

                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Daftar') }}
                                </button>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>

@endsection
