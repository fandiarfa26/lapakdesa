@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-12">
        <!-- breadcrumb-->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
            <li aria-current="page" class="breadcrumb-item active">Masuk Akun</li>
            </ol>
        </nav>
        </div>
        <div class="col-lg-6 offset-lg-3">
        <div class="box">
            <h1>Masuk</h1>
            <p class="lead">Sudah memiliki akun?</p>
            <p class="text-muted">Silahkan masukkan username, password, serta masuk sebagai pengguna, pemilik usaha, atau administrator.</p>
            <hr>

            <form method="POST" action="{{ route('login') }}">
                    @csrf

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
                        <label for="password">{{ __('Password') }}</label>

                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                    </div>

                    <div class="form-group">
                        <label for="role">Masuk sebagai:</label>
                        <select name="role" class="form-control">
                            <option value="1">Pengguna</option>
                            <option value="3">Akun Usaha</option>
                            <option value="2">Administrator</option>
                        </select>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-sign-in"></i> {{ __('Masuk') }}
                            </button>
                        </div>
                    </div>
                </form>
        </div>
        </div>
    </div>
</div>
@endsection
