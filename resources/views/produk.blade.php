@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <!-- breadcrumb-->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
                    <li aria-current="page" class="breadcrumb-item active">Produk</li>
                </ol>
            </nav>
            
            <div class="box info-bar">
                <div class="row">
                    {{-- <div class="col-md-12 col-lg-4 products-showing">Showing <strong>12</strong> of <strong>25</strong>
                        products</div>
                    <div class="col-md-12 col-lg-7 products-number-sort">
                        <form class="form-inline d-block d-lg-flex justify-content-between flex-column flex-md-row">
                            <div class="products-number"><strong>Show</strong><a href="#" class="btn btn-sm btn-primary">12</a><a
                                    href="#" class="btn btn-outline-secondary btn-sm">24</a><a href="#" class="btn btn-outline-secondary btn-sm">All</a><span>products</span></div>
                            <div class="products-sort-by mt-2 mt-lg-0"><strong>Sort by</strong>
                                <select name="sort-by" class="form-control">
                                    <option>Price</option>
                                    <option>Name</option>
                                    <option>Sales first</option>
                                </select>
                            </div>
                        </form>
                    </div> --}}
                    <div class="col-md-12 col-lg-4 products-showing">Terdapat <strong>{{ count($produk) }}</strong> produk yang tersedia</div>
                </div>
            </div>

            <div class="row products">
                @forelse ($produk as $p)
                    <div class="col-lg-3 col-md-4">
                        <div class="product">
                            <div class="flip-container">
                                <div class="flipper">
                                <div class="front"><a href="{{ url('/produk/'.$p->id) }}"><img src="{{ asset('storage/images/produk/'.$p->gambar) }}" alt="" class="img-fluid"></a></div>
                                </div>
                            </div><a href="{{ url('/produk/'.$p->id) }}" class="invisible"><img src="{{ asset('storage/images/produk/'.$p->gambar) }}" alt="" class="img-fluid"></a>
                            <div class="text">
                                <h3><a href="{{ url('/produk/'.$p->id) }}">{{ $p->nama }}</a></h3>
                                <p class="price">
                                    Rp {{ $p->harga }}
                                </p>
                                <p class="buttons">
                                    <a href="{{ url('/produk/'.$p->id) }}" class="btn btn-outline-secondary">Lihat detail</a>
                                    <a href="{{ url('/produk/'.$p->id.'/beli') }}" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Beli</a>
                                </p>
                            </div>
                            <!-- /.text-->
                        </div>
                        <!-- /.product            -->
                    </div>    
                @endforeach
                
                
                <!-- /.products-->
            </div>
            {{-- <div class="pages">
                <p class="loadMore"><a href="#" class="btn btn-primary btn-lg"><i class="fa fa-chevron-down"></i> Load
                        more</a></p>
                <nav aria-label="Page navigation example" class="d-flex justify-content-center">
                    <ul class="pagination">
                        <li class="page-item"><a href="#" aria-label="Previous" class="page-link"><span aria-hidden="true">«</span><span
                                    class="sr-only">Previous</span></a></li>
                        <li class="page-item active"><a href="#" class="page-link">1</a></li>
                        <li class="page-item"><a href="#" class="page-link">2</a></li>
                        <li class="page-item"><a href="#" class="page-link">3</a></li>
                        <li class="page-item"><a href="#" class="page-link">4</a></li>
                        <li class="page-item"><a href="#" class="page-link">5</a></li>
                        <li class="page-item"><a href="#" aria-label="Next" class="page-link"><span aria-hidden="true">»</span><span
                                    class="sr-only">Next</span></a></li>
                    </ul>
                </nav>
            </div> --}}
        </div>
        <!-- /.col-lg-9-->
    </div>
</div>
@endsection
