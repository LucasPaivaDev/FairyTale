<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_order');
            $table->float('total_value');
            $table->enum('payment_method', ['credit_card', 'debit_card', 'pix']);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_order')->references('id')->on('orders')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
