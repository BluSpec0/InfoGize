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
            $table->bigIncrements('id');
            $table->string('product_name');
            $table->integer('harga');
            $table->integer('stok');
            $table->string('nama');
            $table->string('kodepart');
            $table->string('kategori');
            $table->string('lokasiparts');
            $table->string('keterangan', 1500)->nullable();
            $table->string('rincian1', 1000)->nullable();
            $table->string('rincian2', 1000)->nullable();
            $table->string('rincian3', 1000)->nullable();
            $table->string('rincian4', 1000)->nullable();
            $table->string('rincian5', 1000)->nullable();
            $table->string('rincian6', 1000)->nullable();
            $table->string('rincian7', 1000)->nullable();
            $table->string('rincian8', 1000)->nullable();
            $table->string('product_image')->nullable(); // Menambahkan kolom gambar produk
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
