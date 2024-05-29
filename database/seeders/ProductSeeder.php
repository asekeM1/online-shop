<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;


class ProductSeeder extends Seeder
{
    public function run()
    {
        // Получаем содержимое файла products.json
        $productsData = json_decode(file_get_contents('products.json'), true);

        // Создаем и сохраняем каждый продукт в базе данных
        foreach ($productsData as $productData) {
            Product::create([
                'category_id' => 3,
                'model' => $productData['model'],
                'memory' => $productData['memory'],
                'price' => $productData['price'],
                'image' => $productData['image']
            ]);
        }
    }

}
