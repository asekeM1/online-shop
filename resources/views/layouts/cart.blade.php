@extends('layouts.index')

@section('content-client')
<section id="cart" class="padding-large position-relative">
    <div class="container">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <h2 class="display-7 text-dark text-uppercase">Корзина</h2>

        @if (count($cart) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Товар</th>
                        <th scope="col">Количество</th>
                        <th scope="col">Цена за единицу</th>
                        <th scope="col">Общая цена</th>
                        <th scope="col">Действия</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cart as $item)
                        <tr>
                            <td>{{ $item['product']->model }}</td>
                            <td>
                                <form action="{{ route('decrement-item', ['product' => $item['product']->id]) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    <button type="submit" class="btn btn-warning btn-sm">-</button>
                                </form>
                                {{ $item['quantity'] }}
                                <form action="{{ route('add-to-cart', ['product' => $item['product']->id]) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-sm">+</button>
                                </form>
                            </td>
                            <td>{{ $item['product']->price }} &#8376;</td>
                            <td>{{ $item['product']->price * $item['quantity'] }} &#8376;</td>
                            <td>
                                <form action="{{ route('remove-from-cart', ['product' => $item['product']->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Удалить</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="d-flex justify-content-end">
                <h4>Общая сумма: {{ $totalPrice }} &#8376;</h4>
            </div>

            <div class="mt-3">
                <form action="{{ route('submit-order') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="customerName" class="form-label">Имя</label>
                        <input type="text" class="form-control" id="customerName" name="customer_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="customerEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="customerEmail" name="customer_email" required>
                    </div>
                    <div class="mb-3">
                        <label for="customerPhone" class="form-label">Телефон</label>
                        <input type="text" class="form-control" id="customerPhone" name="customer_phone" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Отправить заказ</button>
                </form>
            </div>
        @else
            <div class="alert alert-info">
                Ваша корзина пуста.
            </div>
        @endif
    </div>
</section>
@endsection
