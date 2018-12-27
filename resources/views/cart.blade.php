@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <!-- breadcrumb-->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
                    <li aria-current="page" class="breadcrumb-item active">Beli</li>
                </ol>
            </nav>
        </div>
        <div id="basket" class="col-lg-8">
            <div class="box">
                <form method="post" action="{{ url('/transaksi') }}">
                    @csrf
                    <h1>Keranjang Beli</h1>
                    {{-- <p class="text-muted">You currently have 3 item(s) in your cart.</p> --}}
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th colspan="2" width="40%">Produk</th>
                                    <th width="20%">Jumlah</th>
                                    <th width="20%">Harga</th>
                                    <th width="20%">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <img src="{{ asset('storage/images/produk/'.$produk->gambar.'-1.png') }}" alt="{{ $produk->nama }}">

                                    </td>
                                    <td>{{ $produk->nama }}</td>
                                    <td>
                                    <input type="number" style="width:70%" id="jml" name="jumlah_beli" min=1 value="{{ $jml }}" class="form-control">
                                    </td>
                                    <td>Rp <span id="satuan_harga">{{ $produk->harga }}</span></td>
                                    <td id="total_harga">Rp {{ $produk->harga * $jml }}</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="4">Total</th>
                                    <th id="total_harga2">Rp {{ $produk->harga * $jml }}</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.table-responsive-->

                    <h3>Form Pembelian</h3>

                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <input type="hidden" name="produk_id" value="{{ $produk->id }}">
                    <input type="hidden" name="usaha_id" value="{{ $produk->usaha_id }}">

                    <div class="form-group">
                        <label for="nama_tujuan">Nama</label>
                        <input type="text" name="nama_tujuan" class="form-control" value="{{ Auth::user()->nama }}">
                    </div>
                    <div class="form-group">
                        <label for="alamat_tujuan">Alamat</label>
                        <textarea name="alamat_tujuan" class="form-control" id="alamat_tujuan" rows="2">{{ Auth::user()->alamat }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="nohp_tujuan">Nomor yang bisa dihubungi</label>
                        <input type="text" name="nohp_tujuan" class="form-control" value="{{ Auth::user()->no_hp }}">
                    </div>
                    <div class="box-footer d-flex justify-content-between flex-column flex-lg-row">
                        <div class="left"></div>
                        <div class="right">
                            <button type="submit" class="btn btn-primary">Proses Beli <i class="fa fa-chevron-right"></i></button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.box-->
        </div>
        <!-- /.col-lg-9-->
        <div class="col-lg-4">
            <div id="order-summary" class="box">
                <div class="box-header">
                    <h3 class="mb-0">Transaksi</h3>
                </div>
                {{-- <p class="text-muted">Shipping and additional costs are calculated based on the values you have
                    entered.</p> --}}
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>Subtotal Pesanan</td>
                                <th id="total_harga3">Rp {{ $produk->harga * $jml }}</th>
                            </tr>
                            <tr>
                                <td>Biaya Pengiriman</td>
                                <th>Rp <span id="biaya_kirim">0</span></th>
                            </tr>
                            <tr class="total">
                                <td>Total</td>
                                <th id="biaya_transaksi">Rp {{ $produk->harga * $jml }}</th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            
        </div>
        <!-- /.col-md-3-->
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#jml').on('change', function() {
            var jml, subtotal, total;
            jml = $('#jml').val();
            subtotal = parseInt($('#satuan_harga').html()) * jml;
            total = parseInt($('#biaya_kirim').html()) + subtotal;

            $('#total_harga').html('Rp '+subtotal);
            $('#total_harga2').html('Rp '+subtotal);
            $('#total_harga3').html('Rp '+subtotal);
            $('#biaya_transaksi').html('Rp '+total);
        })
    })
</script>
@endsection
