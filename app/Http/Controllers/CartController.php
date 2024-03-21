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

    public function update(Request $request)
{
    // Jika input 'jumlah' kosong, tetapkan nilai defaultnya menjadi 1
    if (!$request->filled('jumlah')) {
        $request->merge(['jumlah' => 1]);
    }

    $request->validate([
        'jumlah' => 'required|numeric|min:1',
    ]);

    $cart = Cart::where('id', $request->id)->first();

    if ($cart) {
        $cart->jumlah = $request->jumlah;
        $cart->save();

        return redirect()->route('cart.view')->with('success', 'Jumlah item dalam keranjang berhasil diperbarui.');
    }

    return redirect()->route('cart.view')->with('error', 'Item dalam keranjang tidak ditemukan.');
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