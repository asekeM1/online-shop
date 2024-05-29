<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

// Контроллер связанный с товарами CRUD
class ProductController extends Controller
{
    public function catalog()
    {
        $products = Product::latest()->paginate(9);
        return view('layouts.catalog', compact('products'));
    }

    public function detailed($id){
        $product = Product::findOrFail($id);
        return view('layouts.show', compact('product'));
    }
    // Общая страница где показаны все товары
    public function index()
    {
        $products = Product::with('category')->get();
        return view('admin.pages.products.index', compact('products'));
    }

    // Страница конкретного товара
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.pages.products.show', compact('product'));
    }

    // Страница создания товара
    public function create()
    {
        $categories = Category::all();
        return view('admin.pages.products.create', compact('categories'));
    }

    // Функция создания товара
    public function store(Request $request)
    {
        $request->validate([
            'model' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'category' => 'required',
            'image' => 'nullable|image',
        ]);

        $product = new Product($request->all());

        if ($request->hasFile('image')) {
            $product->image = $request->file('image')->store('products', 'public');
        }

        $product->save();

        return redirect()->route('products.index')->with('success', 'Продукт создан успешно.');
    }

    // Страница редактирования
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.pages.products.edit', compact('product', 'categories'));
    }

    // Функция редактирования
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'model' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'category_id' => 'required',
            'image' => 'nullable|image',
        ]);

        $product->fill($request->all());

        if ($request->hasFile('image')) {
            $product->image = $request->file('image')->store('products', 'public');
        }

        $product->save();

        return redirect()->route('products.index')->with('success', 'Продукт успешно изменен!');
    }

    // Удаление продукта
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Продукт удален успешно.');
    }
}
