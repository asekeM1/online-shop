<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description'); // Описание продукта
            $table->decimal('price', 8, 2); // Цена с точностью до 2 десятичных знаков
            $table->string('image')->nullable(); // Путь к изображению продукта (может быть пустым)
            $table->string('category')->nullable(); // Категория продукта (может быть пустой)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
}
