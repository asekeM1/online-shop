@extends('admin.admin')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3>Добавить продукт</h3>
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

                        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Название:</label>
                                <input type="text" name="model" id="model" class="form-control" value="{{ old('model') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="description">Описание:</label>
                                <textarea name="description" id="description" class="form-control" rows="4" required>{{ old('description') }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="price">Цена:</label>
                                <input type="text" name="price" id="price" class="form-control" value="{{ old('price') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="category">Память:</label>
                                <select name="memory" id="memory" class="form-control" required>
                                    <option value="">Выберите память</option>
                                        <option value="64GB">64GB</option>
                                        <option value="64GB">128GB</option>
                                        <option value="64GB">256GB</option>
                                        <option value="64GB">512GB</option>
                                        <option value="64GB">1024GB</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="category">Категория:</label>
                                <select name="category" id="category" class="form-control" required>
                                    <option value="">Выберите категорию</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->full_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="image">Изображение:</label>
                                <input type="file" name="image" id="image" class="form-control-file">
                            </div>
                            <button type="submit" class="btn btn-success mt-3">Добавить продукт</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
