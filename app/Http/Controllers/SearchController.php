<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product; // Ganti dengan model yang sesuai

class SearchController extends Controller
{
    public function infosearch(Request $request)
{
    $query = $request->input('query');
    $products = Product::where('product_name', 'LIKE', "%$query%")
                    ->orWhere('nama', 'LIKE', "%$query%")
                    ->orWhere('kodepart', 'LIKE', "%$query%")
                    ->orWhere('kategori', 'LIKE', "%$query%")->get();

    return view('pages.informations', compact('products'));
}

public function productsearch(Request $request)
{
    $query = $request->input('query');
    $products = Product::where('product_name', 'LIKE', "%$query%")
                    ->orWhere('nama', 'LIKE', "%$query%")      
                    ->orWhere('kategori', 'LIKE', "%$query%")->get();

    return view('pages.products', compact('products'));
}

}