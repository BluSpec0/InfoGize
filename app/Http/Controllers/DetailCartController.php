<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\product; 
use App\Models\Cart;
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

    public function processPayment()
    {
        
        $user = Auth::user();

        $cartItems = Cart::where('user_id', $user->id)->get();

        foreach ($cartItems as $cartItem) {
            History::create([
                'user_id' => $cartItem->user_id,
                'product_id' => $cartItem->product_id,
                'quantity' => $cartItem->quantity,
                'total_price' => $cartItem->product->price * $cartItem->quantity,
                
            ]);

            $cartItem->delete();
        }
        
        return redirect()->route('history.index')->with('success', 'Payment processed successfully. Items moved to history.');
    }

}