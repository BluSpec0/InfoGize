<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product; // Ganti dengan model yang sesuai

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $search = $request->$search;

        $posts = Post::where(function($query) use ($search){

            $query->where('product_name','like', "%$search%")
            ->orWhere('deskripsi','like',"%$search%");
    })

    ->get();

    return view('index', compact('posts','search'));

    }

}