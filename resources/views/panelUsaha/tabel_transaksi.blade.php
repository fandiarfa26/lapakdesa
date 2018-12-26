
@extends('layouts.appUsaha')

@section('content')

<div class="page-header">
    <h3 class="page-title">
        Transaksi
    </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/p_usaha/produk') }}">Transaksi</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tabel Transaksi</li>
        </ol>
    </nav>
</div>
<div class="row">
<div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Tabel Transaksi</h4>
            <div class="table-responsive">
            <table class="table">
              <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tanggal</th>
                        <th>User</th>
                        <th>Produk</th>
                        <th>Jumlah</th>
                        <th>Status Bayar</th>
                        <th>Status Kirim</th>
                    </tr>
              </thead>
              <tbody>
                    @forelse ($transaksi as $t)
            <tr>
            <td><a href="{{ url('/p_usaha/transaksi/'.$t->id) }}" title="Lihat detail transaksi">#{{ $t->id }}</a></td>
                <td>{{$t->created_at}}</td>
                <td>{{$t->user->nama}}</td>
                <td>{{$t->produk->nama}}</td>
                <td>{{$t->jumlah_beli}}</td>
                <td>
                    @if ($t->status_bayar == 0)
                    <span class="badge badge-danger">Belum</span>
                    @else
                    <span class="badge badge-success">Sudah</span>
                    @endif
                </td>
                <td>
                    @if ($t->status_kirim == 'menunggu')
                        <span class="badge badge-warning text-body">
                            <i class="mdi mdi-timer-sand"></i> Menunggu</span>
                    @elseif ($t->status_kirim == 'mengirim')
                        <span class="badge badge-info">
                            <i class="mdi mdi-truck-delivery"></i> Mengirim</span>
                    @else
                        <span class="badge badge-success">
                            <i class="mdi mdi-check"></i>Selesai</span>
                    @endif
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="7">Kosong</td>
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
