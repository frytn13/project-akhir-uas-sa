<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Untuk nama produk
            // Gunakan salah satu dari baris di bawah ini untuk 'weight', sesuai kebutuhan presisi:
            // $table->float('weight'); // Untuk angka desimal dengan presisi standar
            // $table->double('weight'); // Untuk angka desimal dengan presisi ganda
            $table->decimal('weight', 8, 2); // Paling direkomendasikan untuk presisi: 8 total digit, 2 di belakang koma
            $table->integer('value'); // Atau decimal('value', 15, 2) jika nilai bisa berupa desimal (misalnya, harga dengan sen)
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
};