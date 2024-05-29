@extends('layouts.index')
@section('content-client')
<section id="billboard" class="position-relative overflow-hidden bg-light-blue">
  <div class="container">
  <div class="container">
    <div class="row d-flex align-items-center">
      <div class="col-md-6">
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
        <div class="banner-content">
          <h1 class="display-2 text-uppercase text-dark pb-5">Самое время обновится</h1>
          <a href="{{route('catalog')}}" class="btn btn-medium btn-dark text-uppercase btn-rounded-none">Начать покупки</a>
        </div>
      </div>
      <div class="col-md-5">
        <div class="image-holder">
          <img src="{{ asset('assets/images/banner-image.png') }}" alt="banner">
        </div>
      </div>
    </div>
  </div>
</section>
<section id="company-services" class="padding-large">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-6 pb-3">
        <div class="icon-box d-flex">
          <div class="icon-box-icon pe-3 pb-3">
            <svg class="cart-outline">
              <use xlink:href="#cart-outline" />
            </svg>
          </div>
          <div class="icon-box-content">
            <h3 class="card-title text-uppercase text-dark">Бесплатная доставка</h3>
            <p>Consectetur adipi elit lorem ipsum dolor sit amet.</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 pb-3">
        <div class="icon-box d-flex">
          <div class="icon-box-icon pe-3 pb-3">
            <svg class="quality">
              <use xlink:href="#quality" />
            </svg>
          </div>
          <div class="icon-box-content">
            <h3 class="card-title text-uppercase text-dark">Гарантия качества</h3>
            <p>Dolor sit amet orem ipsu mcons ectetur adipi elit.</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 pb-3">
        <div class="icon-box d-flex">
          <div class="icon-box-icon pe-3 pb-3">
            <svg class="price-tag">
              <use xlink:href="#price-tag" />
            </svg>
          </div>
          <div class="icon-box-content">
            <h3 class="card-title text-uppercase text-dark">Ежедневные предложения</h3>
            <p>Amet consectetur adipi elit loreme ipsum dolor sit.</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 pb-3">
        <div class="icon-box d-flex">
          <div class="icon-box-icon pe-3 pb-3">
            <svg class="shield-plus">
              <use xlink:href="#shield-plus" />
            </svg>
          </div>
          <div class="icon-box-content">
            <h3 class="card-title text-uppercase text-dark">100% безопасная оплата</h3>
            <p>Rem Lopsum dolor sit amet, consectetur adipi elit.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section id="mobile-products" class="product-store position-relative padding-large no-padding-top">
  <div class="container">
    <div class="row">
      <div class="display-header d-flex justify-content-between pb-3">
        <h2 class="display-7 text-dark text-uppercase">Мобильные устройства</h2>
        <div class="btn-right">
          <a href="{{route('catalog')}}" class="btn btn-medium btn-normal text-uppercase">Перейти в магазин</a>
        </div>
      </div>
      <div class="swiper product-swiper">
        <div class="swiper-wrapper">
          @foreach($latest_products as $product)
            <div class="swiper-slide">
                <div class="product-card position-relative">
                  <div class="image-holder">
                    <img src="https://technodom.kz/{{ $product->image }}" alt="product-item" class="img-fluid">
                </div>                      
                    <div class="card-detail d-flex justify-content-between align-items-baseline pt-3">
                        <h3 class="card-title text-uppercase">
                          <a href="{{ route('detailed.product.show', ['product' => $product->id]) }}">{{ $product->model }}</a>
                        </h3>
                        <span class="item-price text-primary">{{ $product->price }}₸</span>
                    </div>
                </div>
            </div>
        @endforeach

        </div>
      </div>
    </div>
  </div>
  <div class="swiper-pagination position-absolute text-center"></div>
</section>
<section id="yearly-sale" class="bg-light-blue overflow-hidden mt-5 padding-xlarge" style="background-image: url('{{asset('assets/images/single-image1.png')}}');background-position: right; background-repeat: no-repeat;">
<div class="row d-flex flex-wrap align-items-center">
    <div class="col-md-6 col-sm-12">
        <div class="text-content offset-4 padding-medium">
            <h3>Скидка 10%</h3>
            <h2 class="display-2 pb-5 text-uppercase text-dark">Распродажа на новый год</h2>
            <a href="{{route('catalog')}}" class="btn btn-medium btn-dark text-uppercase btn-rounded-none">Перейти в магазин</a>
        </div>
    </div>
    <div class="col-md-6 col-sm-12">
      
    </div>
</div>
</section>
@include('layouts.blog')

@endsection
@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        @if(session('success'))
            alert('{{ session('success') }}');
        @endif
    });
</script>
@endsection