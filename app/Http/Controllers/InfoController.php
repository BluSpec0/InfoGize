<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;

class InfoController extends Controller
{
    public function index()
    {
        return view('info');
    }
}
