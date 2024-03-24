<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product; // Ganti dengan model yang sesuai

class SearchController extends Controller
{
    public function infosearch(Request $request)
{
    $query = $request->input('query');
    $products = Product::where('product_name', 'ILIKE', "%$query%")
                    ->orWhere('nama', 'ILIKE', "%$query%")
                    ->orWhere('kodepart', 'ILIKE', "%$query%")
                    ->orWhere('kategori', 'ILIKE', "%$query%")->get();

    return view('pages.informations', compact('products'));
}

public function productsearch(Request $request)
{
    $query = $request->input('query');
    $products = Product::where('product_name', 'ILIKE', "%$query%")
                    ->orWhere('nama', 'ILIKE', "%$query%")      
                    ->orWhere('kategori', 'ILIKE', "%$query%")->get();

    return view('pages.products', compact('products'));
}

public function adminpsearch(Request $request)
{
    $query = $request->input('query');
    $products = Product::where('product_name', 'ILIKE', "%$query%")
                    ->orWhere('nama', 'ILIKE', "%$query%")      
                    ->orWhere('kategori', 'ILIKE', "%$query%")->get();

    return view('pages.admin.upload', compact('products'));
}

}