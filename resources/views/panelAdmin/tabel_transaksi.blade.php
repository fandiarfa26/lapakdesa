
@extends('layouts.appAdmin')

@section('content')

<div class="page-header">
    <h3 class="page-title">
        Transaksi
    </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/p_admin/transaksi') }}">Transaksi</a></li>
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
                        <th>Tanggal</th>
                        <th>User</th>
                        <th>Produk</th>
                        <th>Jumlah</th>
                        <th>Status Bayar</th>
                        <th>Status Kirim</th>
                        <th>Opsi</th>
                    </tr>
              </thead>
              <tbody>
                    @forelse ($transaksi as $t)
            <tr 
            @if ($t->status_kirim == 'menunggu')
                class="table-warning"
            @elseif ($t->status_kirim == 'mengirim')
                class="table-info"
            @else
                class="table-success"
            @endif
            >
                <td>{{$t->created_at}}</td>
                <td>{{$t->user->nama}}</td>
                <td>{{$t->produk->nama}}</td>
                <td>{{$t->jumlah_beli}}</td>
                <td>
                    <form action="/p_admin/transaksi/{{ $t->id}}/bayar" method="post" style="display:inline">
                        @method('patch')
                        @csrf
                        @if($t->status_bayar)
                            <button type="submit" class="btn btn-success btn-sm btn-rounded">
                                <i class="mdi mdi-check"></i>
                                <span>Sudah Membayar</span>
                            </button>
                        @else
                            <button type="submit" class="btn btn-danger btn-sm btn-rounded">
                                <span>Belum Membayar</span>
                            </button>
                        @endif
                    </form>
                </td>
                <td>
                    @if ($t->status_kirim == 'menunggu')
                        <form action="/p_admin/transaksi/{{ $t->id}}/kirim/mengirim" method="post" style="display:inline">
                            @method('patch')
                            @csrf
                            
                            <button type="submit" class="btn btn-warning text-body btn-sm btn-rounded">
                                <i class="mdi mdi-timer-sand"></i>
                                <span>Menunggu</span>
                            </button>

                        </form>
                    @elseif ($t->status_kirim == 'mengirim')
                        <form action="/p_admin/transaksi/{{ $t->id}}/kirim/selesai" method="post" style="display:inline">
                            @method('patch')
                            @csrf
                            
                            <button type="submit" class="btn btn-info btn-sm btn-rounded">
                                <i class="mdi mdi-truck-delivery"></i>
                                <span>Mengirim</span>
                            </button>

                        </form>
                    @else
                        <span class="badge badge-success">
                            <i class="mdi mdi-check"></i>Selesai</span>
                    @endif
                        
                </td>
                <td>
                    <a href="/p_admin/transaksi/{{ $t->id }}" class="btn btn-primary btn-sm btn-rounded">
                        <i class="mdi mdi-eye"></i>
                        <span>Detail</span>
                    </a>
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
