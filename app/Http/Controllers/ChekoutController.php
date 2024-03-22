<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\product; 
use App\Models\Cart;
use Auth;

class ChekoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function view($id)
    {
        $product = Product::where('id', $id)->first();
        $user = User::where('id', Auth::user()->id)->first();
        $user_id = Auth::id();
        $carts = Cart::where('user_id', $user_id)->with('product')->get();


        return view('pages.checkout', compact('product', 'user', 'carts'));
    }

    public function directview($id)
    {
        $product = Product::where('id', $id)->first();
        $user = User::where('id', Auth::user()->id)->first();

        return view('pages.checkoutdirect', compact('product', 'user'));
    }
    public function update(Request $request)
{
    // Dapatkan produk yang sedang diubah
    $productId = $request->session()->get('product_id'); // Misalnya, jika Anda menyimpannya di sesi

    // Pastikan produk ditemukan
    $product = Product::find($productId);
    if (!$product) {
        return redirect()->back()->with('error', 'Produk tidak ditemukan.');
    }
    
    // Dapatkan informasi pengguna yang sedang login
    $user = Auth::user();

    // Perbarui alamat pengguna jika ada yang diisi
    if (!empty($request->address)) {
        $user->address = $request->address;
    }

    // Simpan perubahan informasi pengguna
    if ($user->save()) {
        // Kembalikan pengguna ke halaman produk sesuai ID produk yang sedang diubah
        return redirect()->route('checkout', ['id' => $productId])->with('success', 'Alamat pengiriman berhasil diperbarui.');
    } else {
        // Jika gagal menyimpan, kembalikan dengan pesan error
        return redirect()->back()->with('error', 'Gagal memperbarui alamat pengiriman.');
    }
}
    // public function update(Request $request, $id)
    // {
    //     // Dapatkan produk yang sedang diubah
    //     $product = Product::find($id);

    //     // Pastikan produk ditemukan
    //     if (!$product) {
    //         return redirect()->back()->with('error', 'Produk tidak ditemukan.');
    //     }
        
    //     // Dapatkan informasi pengguna yang sedang login berdasarkan id pengguna
    //     $user = User::find(Auth::user()->id);

    //     // Perbarui alamat pengguna jika ada yang diisi
    //     if (!empty($request->address)) {
    //         $user->address = $request->address;
    //     }

    //     // Simpan perubahan informasi pengguna
    //     if ($user->save()) {
    //         // Kembalikan pengguna ke halaman produk sesuai ID produk yang sedang diubah
    //         return redirect()->route('product.show', ['id' => $id])->with('success', 'Alamat pengiriman berhasil diperbarui.');
    //     } else {
    //         // Jika gagal menyimpan, kembalikan dengan pesan error
    //         return redirect()->back()->with('error', 'Gagal memperbarui alamat pengiriman.');
    //     }
    // }
}
