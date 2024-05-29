@extends('admin.admin')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>Подробности товара</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="model">Модель:</label>
                                <p>{{ $product->model }}</p>
                            </div>
                            <div class="form-group">
                                <label for="description">Описание:</label>
                                <p>{{ $product->description }}</p>
                            </div>
                            <div class="form-group">
                                <label for="price">Цена:</label>
                                <p>{{ $product->price }}</p>
                            </div>
                            <div class="form-group">
                                <label for="memory">Память:</label>
                                <p>{{ $product->memory }}</p>
                            </div>
                            <div class="form-group">
                                <label for="category">Категория:</label>
                                <p>{{ $product->category->full_name ?? 'Без категории' }}</p>
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('products.index') }}" class="btn btn-primary">Назад к списку</a>
                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Редактировать</a>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Вы уверены, что хотите удалить этот продукт?');">Удалить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
