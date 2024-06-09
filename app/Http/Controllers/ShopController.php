<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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

    public function checkout($slug)
    {
        $product = DB::table('products')->where('slug', $slug)->first();
        return view('shop/checkout', compact('product'));
    }

    public function history()
    {
        $orders = [];
        return view('shop/history', compact('orders'));
    }

    public function purchase(Request $request)
    {
        $input = $request->input();
        
        $order_code = strtoupper(Str::random('8'));

        $product = DB::table('products')->where('id', $input['product_id'])->first();

        DB::table('transactions')->insert([
            'product_id' => $input['product_id'],
            'order_code' => $order_code,
            'amount' => $input['amount'],
            'qty' => 1,
            'customer_name' => $input['name'],
            'customer_email' => $input['email'],
            'customer_phone' => $input['phone'],
            'status' => 'pending',
            'note' => 'Belum ada',
            'customer_location' => 'Bandung'
        ]);

        return view('shop/purchase', ['order_code' => $order_code, 'amount' => $input['amount'], 'product' => $product]);
    }
}
