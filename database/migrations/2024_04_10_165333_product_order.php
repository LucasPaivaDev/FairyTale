<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('product_order', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_product');
            $table->unsignedBigInteger('id_order');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_product')->references('id')->on('products');
            $table->foreign('id_order')->references('id')->on('orders');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('product_order');
    }
};
