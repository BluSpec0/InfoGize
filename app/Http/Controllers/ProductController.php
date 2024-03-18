<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Menyimpan data produk baru ke dalam database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi input dari request
        $request->validate([
            'product_name' => 'required|string',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            'product_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Contoh validasi untuk product_image
        ]);

        $image = $request->file('product_image');
        $image_url = CloudinaryStorage::uploadProduct($image->getRealPath(), $image->getClientOriginalName());

        // Simpan data produk ke dalam database satu per satu
        $product = new Product();
        $product->product_name = $request->product_name;
        $product->harga = $request->harga;
        $product->stok = $request->stok;
        $product->nama = $request->nama;
        $product->kodepart = $request->kodepart;
        $product->kategori = $request->kategori;
        $product->lokasiparts = $request->lokasiparts;
        $product->keterangan = $request->keterangan;
        $product->rincian1 = $request->rincian1;
        $product->rincian2 = $request->rincian2;
        $product->rincian3 = $request->rincian3;
        $product->rincian4 = $request->rincian4;
        $product->rincian5 = $request->rincian5;
        $product->rincian6 = $request->rincian6;
        $product->rincian7 = $request->rincian7;
        $product->rincian8 = $request->rincian8;
        $product->product_image = $image_url;

        // Simpan data produk ke dalam database
        $product->save();

        // Jika data berhasil disimpan, kembalikan respons sukses
        return response()->json(['message' => 'Product created successfully'], 201);
    }
}
