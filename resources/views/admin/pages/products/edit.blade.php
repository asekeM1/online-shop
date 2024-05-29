@extends('admin.admin')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>Редактировать товар</h3>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="model">Модель:</label>
                            <input type="text" name="model" id="model" class="form-control" value="{{ old('model', $product->model) }}" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Описание:</label>
                            <textarea name="description" id="description" class="form-control" rows="4" required>{{ old('description', $product->description) }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="price">Цена:</label>
                            <input type="text" name="price" id="price" class="form-control" value="{{ old('price', $product->price) }}" required>
                        </div>
                        <div class="form-group">
                            <label for="memory">Память:</label>
                            <select name="memory" id="memory" class="form-control" required>
                                <option value="">Выберите память</option>
                                <option value="64GB" {{ $product->memory == '64GB' ? 'selected' : '' }}>64GB</option>
                                <option value="128GB" {{ $product->memory == '128GB' ? 'selected' : '' }}>128GB</option>
                                <option value="256GB" {{ $product->memory == '256GB' ? 'selected' : '' }}>256GB</option>
                                <option value="512GB" {{ $product->memory == '512GB' ? 'selected' : '' }}>512GB</option>
                                <option value="1024GB" {{ $product->memory == '1024GB' ? 'selected' : '' }}>1024GB</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="category">Категория:</label>
                            <select name="category_id" id="category" class="form-control" required>
                                <option value="">Выберите категорию</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->full_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="image">Изображение:</label>
                            <input type="file" name="image" id="image" class="form-control-file">
                            @if($product->image)
                                <div class="mt-2">
                                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="img-fluid rounded" style="max-width: 100%; height: auto;">
                                </div>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-success mt-3">Сохранить изменения</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
