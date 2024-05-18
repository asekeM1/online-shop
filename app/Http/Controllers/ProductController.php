<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    // Метод для отображения списка всех товаров
    public function index()
    {
        $products = Product::all();
        return view('admin.pages.products.index', compact('products'));
    }

    // Метод для отображения детальной информации о товаре
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.pages.products.show', compact('product'));
    }

}
