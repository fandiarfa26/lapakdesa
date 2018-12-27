@extends('layouts.appUsaha')

@section('content')

<div class="page-header">
    <h3 class="page-title">
        Produk
    </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/p_usaha/produk') }}">Produk</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tabel Produk</li>
        </ol>
    </nav>
</div>
<div class="row">
<div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title float-left">Tabel Produk</h4>{{ rand() }}
            <a href="{{ url('/p_usaha/produk/form') }}" class="btn btn-success btn-sm btn-rounded float-right">
                <i class="mdi mdi-plus"></i>
                <span>Tambah</span>
            </a>
            <div class="table-responsive">
            <table class="table">
              <thead>
                    <tr>
                        <th width="10%">ID</th>
                        <th width="20%">Gambar</th>
                        <th >Nama</th>
                        <th >Harga</th>
                        <th width="30%">Opsi</th>
                    </tr>
              </thead>
              <tbody>
                    @forelse ($produk as $p)
                    <tr>
                        <td>{{ $p->id }}</td>
                        <td class="py-1">
                        <img src="{{ asset('storage/images/produk/'.$p->gambar.'-1.png') }}" alt="image"/>
                        </td>
                        <td>{{ $p->nama }}</td>
                        <td>{{ $p->harga }}</td>
                        <td>
                            <a href="/p_usaha/produk/{{ $p->id }}" class="btn btn-primary btn-sm btn-rounded">
                                <i class="mdi mdi-eye"></i>
                                <span>Detail</span>
                            </a>
                            <a href="/p_usaha/produk/{{ $p->id }}/edit" class="btn btn-info btn-sm btn-rounded">
                                <i class="mdi mdi-pencil"></i>
                                <span>Edit</span>
                            </a>
                            <form action="/p_usaha/produk/{{ $p->id}}" method="post" style="display:inline">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm btn-rounded">
                                    <i class="mdi mdi-delete"></i>
                                    <span>Hapus</span>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan=5>Kosong</td>
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
