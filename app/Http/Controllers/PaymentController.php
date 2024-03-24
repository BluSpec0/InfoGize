<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\product; 
use App\Models\History;
use App\Models\Cart;
use Auth;

class PaymentController extends Controller
{
    public function index($id) {
        $user_id = Auth::id();
        $historis = History::where('user_id', $user_id)->with('product')->get();

        return view('pages.payment', compact('historis'));
    }
}
