
@extends('layouts.appAdmin')

@section('content')

<div class="page-header">
    <h3 class="page-title">
        Usaha
    </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/p_admin/usaha') }}">Usaha</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tabel Usaha</li>
        </ol>
    </nav>
</div>
<div class="row">
<div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Tabel Usaha</h4>
            <div class="table-responsive">
            <table class="table">
              <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Nomor HP</th>
                        <th>Status</th>
                        <th>Opsi</th>
                    </tr>
              </thead>
              <tbody>
                    @forelse ($usaha as $u)
            <tr>
                <td>{{$u->id}}</td>
                <td>
                <a href="/p_admin/usaha/{{ $u->id }}" data-toggle="tooltip" data-placement="top" title="Lihat Detail {{ $u->nama }}">
                    {{$u->user->nama}}
                </a>
                </td>
                <td>{{$u->user->alamat}}</td>
                <td>{{$u->user->no_hp}}</td>
                <td>
                    @if($u->terverifikasi)
                            <span class="badge badge-success">Terverifikasi</span>
                        
                    @else
                        <span class="badge badge-danger">Belum Terverifikasi</span>
                    @endif
                </td>
                <td>
                        <form action="/p_admin/usaha/{{ $u->id}}" method="post" style="display:inline">
                            @method('patch')
                            @csrf

                            @if($u->terverifikasi)
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
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6">Kosong</td>
            </tr>
        @endforelse
                
              </tbody>
            </table>
        </div>
          </div>
        </div>
      </div>
    </div>

@endsection
