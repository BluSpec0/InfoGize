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
        $user = User::where('id', Auth::user()->id)->first();

        return view('pages.checkout', compact('product', 'user'));
    }
}
