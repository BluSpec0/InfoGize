<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\product; 
use Auth;

class ChekoutController extends Controller
{
    public function view($id)
    {
        $product = Product::where('id', $id)->first();
        return view('pages.checkout', compact('product'));
    }
}
