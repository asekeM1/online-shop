<!-- resources/views/admin/categories/create.blade.php -->

@extends('admin.admin')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3>Добавить категорию</h3>
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

                        <form action="{{ route('categories.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="short_name">Короткое название:</label>
                                <input type="text" name="short_name" id="short_name" class="form-control" value="{{ old('short_name') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="full_name">Полное название:</label>
                                <input type="text" name="full_name" id="full_name" class="form-control" value="{{ old('full_name') }}" required>
                            </div>
                            <button type="submit" class="btn btn-success mt-3">Добавить категорию</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
