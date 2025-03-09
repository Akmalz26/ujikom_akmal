@extends('layouts.header')
@section('content')
    <!-- Start Hero Section -->
    <div class="hero">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-5">
                    <div class="intro-excerpt">
                        <h1>Shop</h1>
                    </div>
                </div>
                <div class="col-lg-7">

                </div>
            </div>
        </div>
    </div>
    <!-- End Hero Section -->



    <div class="untree_co-section product-section before-footer-section">
        <div class="container">
            <div class="row">

                <!-- Start Column 2 -->
                @foreach ($produks as $produk)
                    <div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
                        <a class="product-item" href="{{ url('pesan') }}/{{ $produk->id }}">
                            <img src="{{ asset('image/' . $produk->image) }}" class="img-fluid product-thumbnail">
                            <h3 class="product-title">{{ $produk->nama }}</h3>
                            <strong class="product-price">Rp. {{ number_format($produk->harga) }}</strong>

                            <span class="icon-cross">
                                <img src="frontend/images/cross.svg" class="img-fluid">
                            </span>
                        </a>
                    </div>
                @endforeach
                <!-- End Column 2 -->
            </div>
        </div>
    </div>
@endsection
