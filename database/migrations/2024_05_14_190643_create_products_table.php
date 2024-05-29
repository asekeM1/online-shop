<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id')->default(3); // Установим значение по умолчанию на "GSM"
            $table->string('model');
            $table->string('memory');
            $table->text('description')->nullable(); // Описание продукта
            $table->decimal('price', 8, 2); // Цена с точностью до 2 десятичных знаков
            $table->string('image')->nullable(); // Путь к изображению продукта (может быть пустым)
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
