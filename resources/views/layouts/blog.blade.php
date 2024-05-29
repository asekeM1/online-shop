<section id="latest-blog" class="padding-large">
    <div class="container">
        <div class="row">
            <div class="display-header d-flex justify-content-between pb-3">
                <h2 class="display-7 text-dark text-uppercase">Горящие предложения</h2>
            </div>
            <div class="post-grid d-flex flex-wrap justify-content-between">
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    @foreach ($random as $r)
                    <div class="col">
                        <div class="card" style="height: 450px">
                            <img src="{{ $r->image }}" class="card-img mx-auto w-50 text-center" alt="{{ $r->model }}">
                            <div class="card-body">
                                <h5 class="card-title">{{$r->model}}</h5>
                                <p class="card-text">Память {{$r->memory}}</p>
                                <p class="card-text text-primary">Цена {{$r->price}} &#8376;</p>
                            </div>
                            <div class="card-footer d-flex justify-content-between">
                                <button class="btn btn-primary"><a href="{{route('detailed.product.show', ['product' => $r->id])}}" style="color:white;">Подробнее</a></button>
                            </div>
                        </div>
                    </div>
                    @endforeach
            </div>
        </div>
    </div>
    </section>