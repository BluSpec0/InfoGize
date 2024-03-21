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

    public function delete($id)
    {
    $cartItem = Cart::find($id);

    if (!$cartItem) {
        return redirect()->back()->with('error', 'Item tidak ditemukan dalam keranjang.');
    }

    $cartItem->delete();

    return redirect()->back()->with('success', 'Item berhasil dihapus dari keranjang.');
    }

    public function addToCart(Request $request)
    {
        $product = Product::find($request->product_id);

        if (!$product) {
            return redirect()->back()->with('error', 'Produk tidak ditemukan.');
        }

        $jumlah = $request->input('jumlah', 1);

        $cartItem = new Cart();
        $cartItem->product_id = $product->id;
        $cartItem->jumlah = $jumlah;
        
        // Cek apakah pengguna terautentikasi
        if (Auth::check()) {
            $cartItem->user_id = auth()->user()->id;
        }
        
        $cartItem->save();

        return redirect()->route('cart.view')->with('success', 'Produk berhasil ditambahkan ke keranjang.');
    }

}