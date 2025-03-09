<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Zeta Shop</title>
  <meta name="viewport"
      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.5/css/swiper.min.css'><link rel="stylesheet" href="{{asset('css/style.css')}}">

</head>

@extends('layouts.header')
<body>
  @section('content')
  <!-- Start Hero Section -->
  <div class="hero">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-5">
                <div class="intro-excerpt">
                    <h1>Detail Produk</h1>
                </div>
            </div>
            <div class="col-lg-7">

            </div>
        </div>
    </div>
</div>
<!-- End Hero Section -->
      
<!-- partial:index.partial.html -->
<div class="wrapper">

  <div class="content">
    <div class="bg-shape">
      <img src="{{asset('lg.png')}}" alt="">
    </div>

    <div class="product-img">

      <div class="product-img__item" id="img1">
        <img src="https://res.cloudinary.com/muhammederdem/image/upload/q_60/v1536405217/starwars/item-1.webp" alt="star wars" class="product-img__img">
      </div>

      <div class="product-img__item" id="img2">
        <img src="https://res.cloudinary.com/muhammederdem/image/upload/q_60/v1536405217/starwars/item-2.webp" alt="star wars" class="product-img__img">
      </div>

      <div class="product-img__item" id="img3">
        <img src="https://res.cloudinary.com/muhammederdem/image/upload/q_60/v1536405218/starwars/item-3.webp" alt="star wars" class="product-img__img">
      </div>

      <div class="product-img__item" id="img4">
        <img src="{{ asset('image/' . $produk->image) }}" alt="star wars" width="450px" class="product-img__img">
      </div>

    </div>

    <div class="product-slider">
      <div class="product-slider__wrp swiper-wrapper">
        <div class="product-slider__item swiper-slide" data-target="img4">
          <div class="product-slider__card">
            <img src="https://res.cloudinary.com/muhammederdem/image/upload/q_60/v1536405223/starwars/item-4-bg.webp" alt="star wars" class="product-slider__cover">
            <div class="product-slider__content">
              <h1 class="product-slider__title">
                {{ $produk->nama }}
              </h1>
              <span class="product-slider__price">Rp.  {{ number_format ($produk->harga) }}</span>
              <div class="product-ctr">
                <div class="product-labels">
                  <div class="product-labels__title">Stok : {{ $produk->stok }}</div>
                  <div class="product-labels__title">Deskripsi :</div>
                  <div class="product-labels__title1">
                      {{ $produk->deskripsi }}
                    </div>
                </div>
              </div>
              <div class="product-slider__bottom">
                <form method="post" action="{{ url('pesan') }}/{{ $produk->id }}" >
                  @csrf
                 <input class="form-control text-center me-3" id="jumlah_pesan" name="jumlah_pesan" type="num" value="1" style="max-width: 3rem; display: none;" />
                <button class="product-slider__cart" >
                  ADD TO CART
                </button>
              </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<svg class="hidden" hidden>
  <symbol id="icon-arrow-left" viewBox="0 0 32 32">
    <path d="M0.704 17.696l9.856 9.856c0.896 0.896 2.432 0.896 3.328 0s0.896-2.432 0-3.328l-5.792-5.856h21.568c1.312 0 2.368-1.056 2.368-2.368s-1.056-2.368-2.368-2.368h-21.568l5.824-5.824c0.896-0.896 0.896-2.432 0-3.328-0.48-0.48-1.088-0.704-1.696-0.704s-1.216 0.224-1.696 0.704l-9.824 9.824c-0.448 0.448-0.704 1.056-0.704 1.696s0.224 1.248 0.704 1.696z"></path>
  </symbol>
  <symbol id="icon-arrow-right" viewBox="0 0 32 32">
    <path d="M31.296 14.336l-9.888-9.888c-0.896-0.896-2.432-0.896-3.328 0s-0.896 2.432 0 3.328l5.824 5.856h-21.536c-1.312 0-2.368 1.056-2.368 2.368s1.056 2.368 2.368 2.368h21.568l-5.856 5.824c-0.896 0.896-0.896 2.432 0 3.328 0.48 0.48 1.088 0.704 1.696 0.704s1.216-0.224 1.696-0.704l9.824-9.824c0.448-0.448 0.704-1.056 0.704-1.696s-0.224-1.248-0.704-1.664z"></path>
  </symbol>
</svg>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.5/js/swiper.min.js'></script><script  src="{{asset('js/script.js')}}"></script>
@endsection

</body>
</html>
