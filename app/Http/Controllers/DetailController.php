<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\order;
use App\Models\orderdetail;
use App\Models\product; 
use Auth;
use Carbon;

class DetailController extends Controller
{
    public function show($id)
    {
        $product = Product::where('id', $id)->first();

        return view('pages.infodetail', compact('product'));
    }

    public function order(Request $request, $id)
    {	
    	$product = product::where('id', $id)->first();
    	$tanggal = Carbon::now();

    	//validasi apakah melebihi stok
    	if($request->jumlah_pesan > $product->stok)
    	{
    		return redirect('pages/'.$id);
    	}

    	//cek validasi
    	$cek_order = order::where('user_id', Auth::user()->id)->where('status',0)->first();
    	//simpan ke database pesanan
    	if(empty($cek_order))
    	{
    		$order = new order;
	    	$order->user_id = Auth::user()->id;
	    	$order->tanggal = $tanggal;
	    	$order->status = 0;
	    	$order->jumlah_harga = 0;
            $order->kode = mt_rand(100, 999);
	    	$order->save();
    	}
    	

    	//simpan ke database pesanan detail
    	$order_baru = order::where('user_id', Auth::user()->id)->where('status',0)->first();

    	//cek pesanan detail
    	$cek_order_detail = orderdetail::where('product_id', $product->id)->where('order_id', $order_baru->id)->first();
    	if(empty($cek_order_detail))
    	{
    		$orderdetail = new orderdetail;
	    	$orderdetail->product_id = $product->id;
	    	$orderdetail->order_id = $order_baru->id;
	    	$orderdetail->jumlah = $request->jumlah_pesan;
	    	$orderdetail->jumlah_harga = $product->harga*$request->jumlah_pesan;
	    	$orderdetail->save();
    	}else 
    	{
    		$orderdetail = orderdetail::where('order_id', $product->id)->where('order_id', $order_baru->id)->first();

    		$orderdetail->jumlah = $orderdetail->jumlah+$request->jumlah_pesan;

    		//harga sekarang
    		$harga_order_detail_baru = $product->harga*$request->jumlah_pesan;
	    	$order_detail->jumlah_harga = $order_detail->jumlah_harga+$harga_order_detail_baru;
	    	$order_detail->update();
    	}

    	//jumlah total
    	$order = order::where('user_id', Auth::user()->id)->where('status',0)->first();
    	$order->jumlah_harga = $order->jumlah_harga+$product->harga*$request->jumlah_pesan;
    	$order->update();
    	
    	return redirect('check-out');

    }

    public function check_out()
    {
        $order = order::where('user_id', Auth::user()->id)->where('status',0)->first();
 	$orderdetails = [];
        if(!empty($order))
        {
            $orderdetails = orderdetail::where('order_id', $order->id)->get();

        }
        
        return view('pages.check_out', compact('order', 'orderdetails'));
    }

    public function delete($id)
    {
        $orderdetail = orderdetail::where('id', $id)->first();

        $order = order::where('id', $orderdetail->order_id)->first();
        $order->jumlah_harga = $order->jumlah_harga-$orderdetail->jumlah_harga;
        $order->update();


        $orderdetail->delete();
        return redirect('check-out');
    }

    public function konfirmasi()
    {
        $user = User::where('id', Auth::user()->id)->first();

        if(empty($user->alamat))
        {
            return redirect('profile');
        }

        if(empty($user->nohp))
        {
            return redirect('profile');
        }

        $order = order::where('user_id', Auth::user()->id)->where('status',0)->first();
        $order_id = $order->id;
        $order->status = 1;
        $order->update();

        $orderdetails = orderdetail::where('order_id', $order_id)->get();
        foreach ($orderdetails as $orderdetail) {
            $product = produk::where('id', $orderdetail->product_id)->first();
            $product->stok = $product->stok-$order_detail->jumlah;
            $product->update();
        }



        return redirect('history/'.$order_id);

    }

}

