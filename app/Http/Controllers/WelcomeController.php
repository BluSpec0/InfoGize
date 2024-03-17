<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;

class WelcomeController extends Controller
{
    public function index()
    {
        $products = Product::get();
        return view('welcome', compact('products'));
    }

    public function informations()
    {
        $products = Product::get();
        return view('pages/informations', compact('products'));
    }

    public function products()
    {
        $products = Product::get();
        return view('pages/products', compact('products'));
    }
}
