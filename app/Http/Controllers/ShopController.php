<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $products = DB::table('products')->get();
        return view('shop/index', compact('products'));
    }

    public function search(Request $request)
    {
        $products = DB::table('products')->where('title', 'LIKE', '%'. $request->get('keyword') .'%')->get();
        return view('shop/search', compact('products'));
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

    public function order()
    {
        $orders = DB::table('transactions')->join('products', 'products.id', '=', 'transactions.product_id')->where('customer_email', Auth::user()->email)->get();
        
        return view('shop/order', compact('orders'));
    }

    public function order_detail($order_code)
    {
        $order = DB::table('transactions')->join('products', 'products.id', '=', 'transactions.product_id')->where('order_code', $order_code)->first();
        
        return view('shop/order_detail', compact('order'));
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

    public function category() {
        $products = DB::table('products')->get();
        $categories = ['Suksom Jaipong', 'Suksom Merapi', 'Red Venus', 'Red Spider', 'Catrina'];
        return view('shop.category', compact('products', 'categories'));
    }

    public function account() {
        $user = Auth::user();
        return view('shop.account', compact('user'));
    }
}
