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
        
        $user = auth()->user();
    
        
        if ($request->filled('address')) {
            $user->address = $request->input('address');
            $user->save();
            return redirect()->back()->with('success', 'Alamat pengiriman berhasil diperbarui.');
        } else {
            return redirect()->back()->with('error', 'Alamat pengiriman tidak boleh kosong.');
        }
    }
}
