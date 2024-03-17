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
            $table->string('keterangan');
            $table->string('rincian1');
            $table->string('rincian2');
            $table->string('rincian3');
            $table->string('rincian4');
            $table->string('rincian5');
            $table->string('rincian6');
            $table->string('rincian7');
            $table->string('rincian8');
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
