<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\CloudinaryStorage;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Controllers\Controller;

class UploadController extends Controller
{
    /**
     * Menyimpan data produk baru ke dalam database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::get();
        return view('pages.admin.upload', compact('products'));
    }
    public function store(Request $request)
    {
        // Validasi input dari request
        $request->validate([
            'product_name' => 'required|string',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            'product_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi untuk gambar
            // Tambahkan validasi untuk atribut lainnya
        ]);

        // Simpan gambar produk
        $image = $request->file('product_image');
        $image_url = CloudinaryStorage::uploadProduct( $image->getRealPath(), $image->getClientOriginalName());

        // Simpan data produk ke dalam database
        Product::create([
            'product_name' => $request->product_name,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'nama' => $request->nama,
            'kodepart' => $request->kodepart,
            'kategori' => $request->kategori,
            'lokasiparts' => $request->lokasiparts,
            'keterangan' => $request->keterangan,
            'rincian1' => $request->rincian1,
            'rincian2' => $request->rincian2,
            'rincian3' => $request->rincian3,
            'rincian4' => $request->rincian4,
            'rincian5' => $request->rincian5,
            'rincian6' => $request->rincian6,
            'rincian7' => $request->rincian7,
            'rincian8' => $request->rincian8,
            'product_image' => $image_url
        ]);

        // Jika data berhasil disimpan, redirect ke halaman lain atau kembalikan respons sukses
        return redirect()->view('pages.admin.upload')->with('success', 'Product created successfully.');
    }

    public function update(Request $request, $id)
    {
        // Temukan produk berdasarkan ID
        $product = Product::findOrFail($id);

        // Validasi input dari request
        $request->validate([
            'product_name' => 'required|string',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            'product_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Ubah validasi untuk gambar agar bersifat opsional
            // Tambahkan validasi untuk atribut lainnya
        ]);

        $product = Product::where('id', $id)->first();

        $image = $request->file('product_image');
        $image_url = $image ? CloudinaryStorage::replaceProduct($product->image_url, $image->getRealPath(), $image->getClientOriginalName()) : $product->image_url;

        // Update data produk ke dalam database
        $product->update([
            'product_name' => $request->product_name ?? $product->product_name,
            'harga' => $request->harga ?? $product->harga,
            'stok' => $request->stok ?? $product->stok,
            'nama' => $request->nama ?? $product->nama,
            'kodepart' => $request->kodepart ?? $product->kodepart,
            'kategori' => $request->kategori ?? $product->kategori,
            'lokasiparts' => $request->lokasiparts ?? $product->lokasiparts,
            'keterangan' => $request->keterangan ?? $product->keterangan,
            'rincian1' => $request->rincian1 ?? $product->rincian1,
            'rincian2' => $request->rincian2 ?? $product->rincian2,
            'rincian3' => $request->rincian3 ?? $product->rincian3,
            'rincian4' => $request->rincian4 ?? $product->rincian4,
            'rincian5' => $request->rincian5 ?? $product->rincian5,
            'rincian6' => $request->rincian6 ?? $product->rincian6,
            'rincian7' => $request->rincian7 ?? $product->rincian7,
            'rincian8' => $request->rincian8 ?? $product->rincian8,
            'product_image' => $image_url ?? $product->image_url,
        ]);

        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Product updated successfully.');
    }
}   