<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\product; 
use App\Models\Cart;
use App\Models\History;
use Illuminate\Support\Facades\Auth;

class DetailCartController extends Controller
{
    public function detailcart($id)
    {
        $product = Product::where('id', $id)->first();
        $user = User::where('id', Auth::user()->id)->first();
        $user_id = Auth::id();
        $cart = Cart::where('id', $id)->first();
        return view('pages.detailcart', compact('product', 'user', 'cart'));
    }

    public function processPayment(Request $request)
    {
        $user = Auth::user();
        $product = Product::find($request->product_id);

        $cartItems = Cart::where('user_id', $user->id)->get();
        $cartItems->product_id = $product->id;

        foreach ($cartItems as $cartItem) {
            $cartItem->delete();
        }
        
        return redirect()->route('payment.view', ['id' => $cartItems->id])->with('success', 'Pembelian berhasil.');
    }

}