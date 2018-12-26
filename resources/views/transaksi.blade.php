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
        <div id="customer-orders" class="col-lg-9">
            <div class="box">
                <h1>Pesanan Saya</h1>
                <p class="text-muted">Jika Anda memiliki pertanyaan, jangan ragu untuk menghubungi <a href="/about">kami</a>, pusat layanan pelanggan kami siap melayani kapanpun.</p>
                
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Pesanan</th>
                                <th>Tanggal</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($transaksi as $t)
                                <tr>
                                    <th># {{$t->id}}</th>
                                    <td>{{ $t->created_at }}</td>
                                    <td>Rp {{ $t->total_biaya }}</td>
                                    <td>
                                        @if ($t->status_kirim == 'menunggu')
                                            <span class="badge badge-warning"><i class="fa fa-clock-o" aria-hidden="true"></i> Menunggu</span>
                                        @elseif ($t->status_kirim == 'mengirim')
                                            <span class="badge badge-info"><i class="fa fa-truck" aria-hidden="true"></i> Mengirim</span>
                                        @else
                                            <span class="badge badge-success"><i class="fa fa-check" aria-hidden="true"></i> Selesai</span>
                                        @endif
                                    </td>
                                <td><a href="{{ url('/transaksi/'.$t->id) }}" class="btn btn-primary btn-sm">Detail</a></td>
                                </tr>    
                            @empty
                                <tr>
                                    <td colspan=5>Tidak Ada Pesanan</td>
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
