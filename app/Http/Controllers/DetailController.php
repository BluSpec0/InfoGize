<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\product; 
use Auth;

class DetailController extends Controller
{
    public function productdetail($id)
    {
        $product = Product::where('id', $id)->first();
        return view('pages.productdetail', compact('product'));
    }

    public function showother($id)
    {
    // Ambil data produk yang sedang ditampilkan
    $product = Product::findOrFail($id);

    // Ambil semua produk kecuali produk yang sedang ditampilkan
    $otherProducts = Product::where('id', '!=', $id)->limit(6)->get();

    return view('pages.productdetail', compact('product', 'otherProducts'));
    }

    public function informationdetail($id)
    {
        $product = Product::where('id', $id)->first();
        return view('pages.informationdetail', compact('product'));
    }

    

}

