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
        return view('pages.admin.upload');
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
        return redirect()->route('index')->with('success', 'Product created successfully.');
    }
}   