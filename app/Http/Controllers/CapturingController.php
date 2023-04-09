<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CapturingController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $posts = DB::table('posts')->where(['user_id' => Auth::user()->id, 'status' => 'Diterima'])->orderBy('id', 'desc')->get();

        return view('knowledge.capturing', compact('posts'));
    }
}
