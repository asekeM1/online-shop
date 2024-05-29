@extends('layouts.index')
@section('content-client')
<section id="product-details" class="padding-large position-relative">
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <img src="https://technodom.kz/{{ $product->image }}" class="img-fluid" alt="{{ $product->model }}">
            </div>
            <div class="col-lg-6">
                <h2 class="display-7 text-dark text-uppercase">{{ $product->model }}</h2>
                <p class="text-muted">Память: {{ $product->memory }}</p>
                <p class="text-primary">Цена: {{ $product->price }} &#8376;</p>
                <p>{{ $product->description }}</p>
                <form action="{{ route('add-to-cart', ['product' => $product->id]) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-success">Добавить в корзину</button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
