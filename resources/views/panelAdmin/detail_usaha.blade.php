@extends('layouts.appAdmin')

@section('content')
<div class="page-header">
    <h3 class="page-title">
        Detail Lapak
    </h3>
</div>
<div class="row">
        <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Detail Lapak {{ $usaha->user->nama}}</h4>
                    
                  </div>
                  <div class="card-body">
                        <div class="row">
                                <div class="col-md-3">
                                    <div>
                                        <img src="{{ asset('storage/images/user/'.$usaha->user->avatar) }}" class="img-fluid" alt="Responsive image">
                                    </div>
                                </div>
                            <div class="col-md-9">
                                <h5 class="font-weight-bold">Nama:</h5>
                                <p>{{$usaha->user->nama}}</p>
                                <h5 class="font-weight-bold">Deskripsi:</h5>
                                <p>{{$usaha->deskripsi}}</p>
                                <h5 class="font-weight-bold">Alamat</h5>
                                <p>{{$usaha->user->alamat}}</p>
                                <h5 class="font-weight-bold">Nomor HP</h5>
                                <p>{{$usaha->user->no_hp}}</p>
                                <h5 class="font-weight-bold">Username</h5>
                                <p>{{$usaha->user->username}}</p>
                                <h5 class="font-weight-bold">Status</h5>
                                <p>
                                    @if($usaha->terverifikasi)
                                            <span class="badge badge-success">Terverifikasi</span>
                                        
                                    @else
                                        <span class="badge badge-danger">Belum Terverifikasi</span>
                                        
                                    @endif

                                    <form action="/p_admin/lapak/{{ $usaha->id}}" method="post" style="display:inline">
                                        @method('patch')
                                        @csrf
                                        @if($usaha->terverifikasi)
                                            <button type="submit" class="btn btn-danger btn-sm btn-rounded">
                                                <i class="mdi mdi-checkbox-blank"></i>
                                                <span>Cabut Izin</span>
                                            </button>
                                        @else
                                        <button type="submit" class="btn btn-info btn-sm btn-rounded">
                                                <i class="mdi mdi-checkbox-marked"></i>
                                                <span>Izinkan</span>
                                            </button>
                                        @endif
                                    </form>
                                </p>
                          </div>
                        </div>
                  </div>
                </div>
              </div>
</div>

@endsection

