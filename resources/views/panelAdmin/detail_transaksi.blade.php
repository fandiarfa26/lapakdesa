
@extends('layouts.appAdmin')

@section('content')

<div class="page-header">
    <h3 class="page-title">
        Transaksi
    </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/p_admin/transaksi') }}">Transaksi</a></li>
        <li class="breadcrumb-item active" aria-current="page">Detail Transaksi</li>
        </ol>
    </nav>
</div>
<div class="row">
<div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Detail Transaksi</h4>
            <div class="table-responsive mb-4">
                    <table class="table">
                        <thead>
                            <tr>
                                <th colspan="2">Produk</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <a href="{{ url('/produk/'.$t->produk->id) }}"><img src="{{ asset('storage/images/produk/'.$t->produk->gambar) }}" alt="{{ $t->produk->nama }}"></a>
                                </td>
                                <td><a href="{{ url('/produk/'.$t->produk->id) }}">{{ $t->produk->nama }}</a></td>
                                <td>{{ $t->jumlah_beli }}</td>
                                <td>Rp {{ $t->produk->harga }}</td>
                                <td id="total_harga">Rp {{ $t->total_biaya }}</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="4" class="text-right">Subtotal Pesanan</th>
                                <th>Rp {{ $t->total_biaya }}</th>
                            </tr>
                            <tr>
                                <th colspan="4" class="text-right">Biaya Pengiriman</th>
                                <th>Rp 0</th>
                            </tr>
                            <tr>
                                <th colspan="4" class="text-right">Total</th>
                                <th>Rp {{ $t->total_biaya }}</th>
                            </tr>
                        </tfoot>
                    </table>
              </div>
              <!-- /.table-responsive-->
              <div class="row addresses">
                <div class="col-lg-6">
                  <h2>Alamat Tujuan</h2>
                    <p>{{ $t->nama_tujuan }} <br> {{ $t->alamat_tujuan }} <br> {{ $t->nohp_tujuan }}</p>
                </div>
                <div class="col-lg-6">
                  <h2>Alamat Pengemasan</h2>
                  <p>{{ $t->usaha->user->nama }} <br> {{ $t->usaha->user->alamat }} <br> {{ $t->usaha->user->no_hp }}</p>
                </div>
                
                <div class="col-lg-12">
                        <hr>
                        <label for="">Tekan Untuk mengganti proses</label><br>
                        <form action="/p_admin/transaksi/{{ $t->id}}/kirim/menunggu" method="post" style="display:inline">
                            @method('patch')
                            @csrf
                            
                            <button type="submit" class="btn btn-sm btn-rounded
                                @if ($t->status_kirim == 'menunggu')
                                    btn-warning text-body
                                @else
                                    btn-default
                                @endif
                            ">
                                <i class="mdi mdi-timer-sand"></i>
                                <span>Menunggu</span>
                            </button>
    
                        </form>
    
                            <form action="/p_admin/transaksi/{{ $t->id}}/kirim/mengirim" method="post" style="display:inline">
                                @method('patch')
                                @csrf
                                
                                <button type="submit" class="btn btn-sm btn-rounded
                                @if ($t->status_kirim == 'mengirim')
                                    btn-info
                                @else
                                    btn-default
                                @endif
                                ">
                                        <i class="mdi mdi-truck-delivery"></i>
                                        <span>Mengirim</span>
                                    </button>
    
                            </form>
                      
                            <form action="/p_admin/transaksi/{{ $t->id}}/kirim/selesai" method="post" style="display:inline">
                                @method('patch')
                                @csrf
                                
                                <button type="submit" class="btn btn-sm btn-rounded
                                    @if ($t->status_kirim == 'selesai')
                                        btn-success
                                    @else
                                        btn-default
                                    @endif
                                ">
                                    <i class="mdi mdi-check"></i>
                                    <span>Selesai</span>
                                </button>
    
                            </form>
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>

@endsection
