<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    
    }

    /**
     * Transactions
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $transactions = DB::table('transactions')->select('transactions.*', 'products.title as product_name', 'products.price as product_price')
                                                 ->join('products', 'products.id', '=', 'transactions.product_id')
                                                 ->get();
        return view('transaction/index', compact('transactions'));
    }

    public function changeStatus(Request $request)
    {
        // Update status transactions
        DB::table('transactions')->where('id', $request->id)->update(['status' => $request->status]);

        return back()->with('message', 'Berhasil.');
    }

}