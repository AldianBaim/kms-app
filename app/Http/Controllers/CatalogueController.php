<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CatalogueController extends Controller
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
     * Catalogue
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $products = DB::table('products')->get();
        return view('catalogue/index', compact('products'));
    }

    /**
     * Catalogue For Public
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function all(Request $request)
    {
        // Semua produk punya petani. Bukan mode owner/
        return view('catalogue/all');
    }

    public function create() {
        return view('catalogue/create');
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'city' => 'required',
            'image' => 'required',
            'price' => 'required',
            'stock' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $catalogue = $request->file('image')->getClientOriginalName();
            $request->image->storeAs('public/image/catalogue', $catalogue);
        }

        DB::table('products')->insert([
            'title' => $request->title,
            'description' => $request->description,
            'city' => $request->city,
            'image' => $catalogue,
            'price' => $request->price,
            'stock' => $request->stock,
            'created_at' => date('Y-m-d H:i:s')
        ]);

        return redirect('/catalogue')->with('message', 'Katalog baru berhasil ditambahkan');
    }
}