@extends('admin.admin')
@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

@endsection
@section('content')
<section class="content mt-3">
    <div class="container-fluid">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex;">
                        <h3 class="card-title">Список товаров</h3>
                        <h3 class="card-title ml-auto"><a href="{{ route('products.create') }}" class="btn btn-outline-primary">Добавить товар</a></h3>
                    </div>
                    <div class="card-body">
                        <table id="products_table" class="table table-bordered">
                            <thead>                  
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Товар</th>
                                    <th>Цена</th>
                                    <th>Подробнее</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->model}}</td>
                                    <td>{{ $product->price }}</td>
                                    <td><a href="{{ route('products.show', $product->id) }}" class="btn btn-info">Подробнее</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#products_table').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "language": {
                "emptyTable": "Нет данных в таблице",
                "info": "Показано с _START_ по _END_ из _TOTAL_ записей",
                "infoEmpty": "Показано с 0 по 0 из 0 записей",
                "infoFiltered": "(отфильтровано из _MAX_ записей)",
                "lengthMenu": "Показать _MENU_ записей",
                "loadingRecords": "Загрузка...",
                "processing": "Обработка...",
                "search": "Поиск:",
                "zeroRecords": "Совпадений не найдено",
                "paginate": {
                    "first": "Первая",
                    "last": "Последняя",
                    "next": "Следующая",
                    "previous": "Предыдущая"
                },
                "aria": {
                    "sortAscending": ": активировать для сортировки столбца по возрастанию",
                    "sortDescending": ": активировать для сортировки столбца по убыванию"
                }
            }
        });
    });
</script>
@endsection
