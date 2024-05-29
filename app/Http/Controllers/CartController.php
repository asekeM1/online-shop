<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Session;

class CartController extends Controller
{
    public function addToCart(Request $request, Product $product)
    {
        $cart = Session::get('cart', []);

        if (array_key_exists($product->id, $cart)) {
            $cart[$product->id]['quantity']++;
        } else {
            $cart[$product->id] = [
                'product' => $product,
                'quantity' => 1,
            ];
        }

        Session::put('cart', $cart);

        return redirect()->back()->with('success', 'Товар успешно добавлен в корзину.');
    }

    public function showCart()
    {
        $cart = Session::get('cart', []);
        $totalPrice = $this->calculateTotal($cart);

        return view('layouts.cart', ['cart' => $cart, 'totalPrice' => $totalPrice]);
    }

    public function removeFromCart(Product $product)
    {
        $cart = Session::get('cart', []);

        if (isset($cart[$product->id])) {
            unset($cart[$product->id]);
            Session::put('cart', $cart);
        }

        return redirect()->route('cart.show')->with('success', 'Товар успешно удален из корзины.');
    }

    public function decrementItem(Request $request, Product $product)
    {
        $cart = Session::get('cart', []);

        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity']--;

            if ($cart[$product->id]['quantity'] <= 0) {
                unset($cart[$product->id]);
            }

            Session::put('cart', $cart);
        }

        return redirect()->route('cart.show')->with('success', 'Количество товара уменьшено.');
    }

    public function submitOrder(Request $request)
    {
        // Логика обработки заказа

        // Очищаем корзину после оформления заказа
        Session::forget('cart');
        return redirect()->route('home')->with('success', 'Заказ успешно создан.');
    }

    private function calculateTotal($cart)
    {
        $total = 0;

        foreach ($cart as $item) {
            $total += $item['product']->price * $item['quantity'];
        }

        return $total;
    }
}
