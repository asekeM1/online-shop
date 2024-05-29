<!-- resources/views/admin/categories/index.blade.php -->

@extends('admin.admin')

@section('content')
    <div class="container mt-5">
        <h1>Категории</h1>
        <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">Добавить категорию</a>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Короткое название</th>
                    <th>Полное название</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->short_name }}</td>
                        <td>{{ $category->full_name }}</td>
                        <td>
                            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning">Редактировать</a>
                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Удалить</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
