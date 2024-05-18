<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use Illuminate\Support\Facades\File;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $jsonString = File::get(storage_path('app/products.json'));
        $products = json_decode($jsonString, true);

        foreach ($products as $productData) {
            $price = preg_replace('/[^\d.]/', '', $productData['price']); // Удаляем все символы, кроме цифр и точки

            Product::create([
                'name' => $productData['name'],
                'description' => $productData['description'] ?? null,
                'price' => $price, // Используем скорректированное значение цены
                'image' => null,
                'category' => 'GSM'
            ]);
        }
    }
}
