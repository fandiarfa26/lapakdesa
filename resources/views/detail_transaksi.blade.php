@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <!-- breadcrumb-->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
                    <li aria-current="page" class="breadcrumb-item active">Pesanan Saya</li>
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
                                <a href="{{ url('/transaksi') }}" class="nav-link active">
                                    <i class="fa fa-list"></i> Pesanan Saya
                                </a>
                                <a href="{{ url('/profil') }}" class="nav-link">
                                    <i class="fa fa-user"></i> Profil Saya
                                </a>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();" class="nav-link">
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
        <div id="customer-order" class="col-lg-9">
                <div class="box">
                  <h1>Pesanan #{{$t->id}}</h1>
                    <p class="lead">
                        <strong>{{$t->created_at}}</strong> | Pengiriman : 
                        @if ($t->status_kirim == 'menunggu')
                            <span class="badge badge-warning"><i class="fa fa-clock-o" aria-hidden="true"></i> Menunggu</span>
                        @elseif ($t->status_kirim == 'mengirim')
                            <span class="badge badge-info"><i class="fa fa-truck" aria-hidden="true"></i> Mengirim</span>
                        @else
                            <span class="badge badge-success"><i class="fa fa-check" aria-hidden="true"></i> Selesai</span>
                        @endif

                        | 
                        @if ($t->status_bayar)
                        <span class="badge badge-success"><i class="fa fa-money" aria-hidden="true"></i> Sudah Membayar</span>
                        @else
                        <span class="badge badge-danger"><i class="fa fa-money" aria-hidden="true"></i> Belum Membayar</span>
                        <p class="text-muted text-danger">Silahkan membayar pesanan Anda terlebih dahulu.</p>
                        @endif
                    </p>
                    <p class="text-muted">Jika Anda memiliki pertanyaan, jangan ragu untuk menghubungi <a href="/about">kami</a>, pusat layanan pelanggan kami siap melayani kapanpun.</p>
                  
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
                                        <img src="{{ asset('storage/images/produk/'.$t->produk->gambar.'-1.png') }}" alt="{{ $t->produk->nama }}">
                                    </td>
                                    <td>{{ $t->produk->nama }}</td>
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
                  </div>
                </div>
              </div>
    </div>
</div>

@endsection
