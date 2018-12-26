@extends('layouts.appUsaha')

@section('content')
<div class="page-header">
    <h3 class="page-title">
        Profil
    </h3>
</div>
<div class="row">
        <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Profil Usaha</h4>
                    
                  </div>
                  <div class="card-body">
                        <div class="row">
                                <div class="col-md-3">
                                    <div>
                                        <img src="{{ asset('storage/images/user/'.$profil->avatar) }}" class="img-fluid" alt="Responsive image">
                                    </div>
                                    <a href="{{ url('/p_usaha/profil/edit') }}" class="btn btn-link btn-block btn-sm btn-icon-text">
                                        <i class="mdi mdi-pencil"></i>
                                        <span>Edit Profil</span>
                                    </a>
                                </div>
                            <div class="col-md-9">
                                <h5 class="font-weight-bold">Nama:</h5>
                                <p>{{$profil->nama}}</p>
                                <h5 class="font-weight-bold">Deskripsi:</h5>
                                <p>{{$profil->deskripsi}}</p>
                                <h5 class="font-weight-bold">Alamat</h5>
                                <p>{{$profil->alamat}}</p>
                                <h5 class="font-weight-bold">Nomor HP</h5>
                                <p>{{$profil->no_hp}}</p>
                                <h5 class="font-weight-bold">Email</h5>
                                <p>{{$profil->email}}</p>
                                <h5 class="font-weight-bold">Username</h5>
                                <p>{{$profil->username}}</p>
                                <h5 class="font-weight-bold">Status</h5>
                                <p>
                                    @if($profil->terverifikasi)
                                            <span class="badge badge-success">Terverifikasi</span>
                                        
                                    @else
                                        <span class="badge badge-danger">Belum Terverifikasi</span>
                                    @endif
                                </p>
                          </div>
                        </div>
                  </div>
                </div>
              </div>
</div>

@endsection

