<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{

    public function index()
    {
        $products = DB::table('products')->get();
        return view('shop/index', compact('products'));
    }

    public function detail($slug)
    {

        $product = DB::table('products')->where('slug', $slug)->first();
        return view('shop/detail', compact('product'));
    }
}
