<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
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
     * Page generate.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($page)
    {
        return view('pages/' . $page);
    }
}
