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
}
