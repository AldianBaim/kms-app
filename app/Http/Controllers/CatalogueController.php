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
        return view('catalogue/index');
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
}