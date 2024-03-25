<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\product; 
use App\Models\History;
use App\Models\Cart;
use Auth;

class HistoryController extends Controller
{
    public function index ()
    {
        $user_id = Auth::id();
        $historis = History::where('user_id', $user_id)->with('product')->orderBy('created_at', 'desc')->get();

        return view('pages.history', ['histori' => $historis]);
    }

    public function addToHistory(Request $request)
{
    $product = Product::find($request->product_id);

    if (!$product) {
        return redirect()->back()->with('error', 'Produk tidak ditemukan.');
    }

    $cart = Cart::find($request->cart_id);

    $jumlah = $request->input('jumlah', 1);

    $historyItem = new History();
    $historyItem->product_id = $product->id;
    
    if ($request->has('cart_id')) {
        $historyItem->cart_id = $cart->id;
    } else {
        $historyItem->cart_id = null; // Alternatively, if there is no input, set cart_id to null
    }   
    
    $historyItem->jumlah = $jumlah;
    
    // Check if the user is authenticated
    if (Auth::check()) {
        $historyItem->user_id = auth()->user()->id;
        $historyItem->address = auth()->user()->address;
    }
    
    $historyItem->save();

    // Pass the required parameter to the payment view route
    return redirect()->route('payment.view', ['id' => $historyItem->id])->with('success', 'Pembelian berhasil.');
}

}