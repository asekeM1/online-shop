@extends('layouts.index')

@section('content-client')
<section id="smartphones" class="product-store padding-large position-relative">
    <div class="container">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="row">
            <div class="display-header d-flex justify-content-between pb-3">
                <h2 class="display-7 text-dark text-uppercase">Смартфоны</h2>
            </div>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                @foreach ($products as $product)
                <div class="col">
                    <div class="card" style="height: 450px">
                        <img src="https://technodom.kz/{{ $product->image }}" class="card-img mx-auto w-50 text-center" alt="{{ $product->model }}">
                        <div class="card-body">
                            <h5 class="card-title">{{$product->model}}</h5>
                            <p class="card-text">Память {{$product->memory}}</p>
                            <p class="card-text text-primary">Цена {{$product->price}} &#8376;</p>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <button class="btn btn-primary"><a href="{{route('detailed.product.show', ['product' => $product->id])}}" style="color:white;">Подробнее</a></button>
                            <form action="{{ route('add-to-cart', ['product' => $product->id]) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-success">Приобрести</button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="container mt-3">
                {{ $products->links('vendor.pagination.bootstrap-5') }} 
            </div>
        </div>
    </div>
</section>
@endsection
