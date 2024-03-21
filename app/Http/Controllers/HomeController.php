<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        $products = Product::paginate(20);
        return view('pages/home', compact('products'));
    }

    public function role()
    {
        $usertype=Auth()->user()->usertype;

        if($usertype== null)
        {
            return view('pages.home');
        }
        else if($usertype== 'admin')
        {
            return view('pages.admin.dashboard');
        }
        else {
            return redirect()->back();
        }
    }
}