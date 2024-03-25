<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\CloudinaryStorage;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\History;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

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
        $products = Product::orderBy('created_at', 'desc')->get();

        $user_id = Auth::id();
        $historis = History::where('user_id', $user_id)->with('product')->orderBy('created_at', 'desc')->get();
        
        return view('pages.admin.upload', compact('products', 'historis'));
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

    public function createupdate($id)
    {
        $product = Product::where('id', $id)->first();
        return view('pages.admin.editproduct', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $products = Product::find($id);

        $request->validate([
            'product_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $image = $request->file('product_image');
        $image_url = $image ? CloudinaryStorage::replaceProduct($products->image_url, $image->getRealPath(), $image->getClientOriginalName()) : $products->image_url;

        if (!empty($request->product_name)) {
        $products->product_name = $request->product_name;
   		}
		if (!empty($request->nama)) {
        $products->nama = $request->nama;
   		}
		if (!empty($request->kodepart)) {
        $products->kodepart = $request->kodepart;
   		}
		if (!empty($request->harga)) {
    	$products->harga = $request->harga;
   		}
	 	if (!empty($request->stok)) {
     	$products->stok = $request->stok;
   	 	}
		if (!empty($request->kategori)) {
     	$products->kategori = $request->kategori;
   	 	}
        if (!empty($request->lokasiparts)) {
     	$products->lokasiparts = $request->lokasiparts;
   	 	}
        if (!empty($request->keterangan)) {
     	$products->keterangan = $request->keterangan;
   	 	}
        if (!empty($request->rincian1)) {
     	$products->rincian1 = $request->rincian1;
   	 	}
        if (!empty($request->rincian2)) {
     	$products->rincian2 = $request->rincian2;
   	 	}
        if (!empty($request->rincian3)) {
     	$products->rincian3 = $request->rincian3;
   	 	}
        if (!empty($request->rincian4)) {
     	$products->rincian4 = $request->rincian4;
   	 	}
        if (!empty($request->rincian5)) {
     	$products->rincian5 = $request->rincian5;
   	 	}
        if (!empty($request->rincian6)) {
     	$products->rincian6 = $request->rincian6;
   	 	}
        if (!empty($request->rincian7)) {
     	$products->rincian7 = $request->rincian7;
   	 	}
        if (!empty($request->rincian8)) {
     	$products->rincian8 = $request->rincian8;
   	 	}
		if (!empty($request->product_image)) {
        $products->product_image = $image_url;
   		}
    	
    	$products->update();

    	return redirect('create');
    }
}   