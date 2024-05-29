<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.pages.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.pages.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'short_name' => 'required|string|max:255',
            'full_name' => 'required|string|max:255',
        ]);
    
        Category::create([
            'short_name' => $request->input('short_name'),
            'full_name' => $request->input('full_name'),
        ]);
        
        return redirect()->route('categories.index')->with('success', 'Категория добавлена успешно!');
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'short_name' => 'required|string|max:255',
            'full_name' => 'required|string|max:255',
        ]);

        $category->update($request->all());

        return redirect()->route('categories.index')->with('success', 'Категория обновлена успешно!');
    }
    public function edit($id)
{
    $category = Category::findOrFail($id);
    return view('admin.pages.categories.edit', compact('category'));
}

        public function destroy(Category $category)
        {
            $category->delete();

            return redirect()->route('categories.index')->with('success', 'Категория удалена успешно!');
        }
}
