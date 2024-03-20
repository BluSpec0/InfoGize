<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;

class CartController extends Controller
{
    public function view()
    {
    $user_id = Auth::id();
    $carts = Cart::where('user_id', $user_id)->with('product')->get();

    return view('pages.cart', ['cart' => $carts]);
    }

    public function addToCart(Request $request)
    {
        $product = Product::find($request->product_id);

        Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => $request->quantity,
        ]);

        return redirect()->back()->with('success', 'Product added to cart successfully.');
    }

    public function update(Request $request, $id)
	{
    	  $request->validate([
            'jumlah'  => 'required|numeric|min:1',
        ]);
    	$cart = Cart::findOrFail($id);

        // Memperbarui data keranjang dengan data dari request
        $cart->update([
            'jumlah' => $request->filled('jumlah') ? $request->jumlah : 1,
            // Anda bisa menambahkan kolom lain yang ingin diperbarui di sini
        ]);

    	return redirect()->route('cart.view');
    }

}
