<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\order;
use App\Models\orderdetail;
use App\Models\product; 
use Auth;

class HistoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$orders = order::where('user_id', Auth::user()->id)->where('status', '!=',0)->get();

    	return view('history.index', compact('orders'));
    }

    public function detail($id)
    {
    	$order = order::where('id', $id)->first();
    	$orderdetails = orderdetail::where('order_id', $order->id)->get();

     	return view('history.detail', compact('order','orderdetails'));
    }
}
