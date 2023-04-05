<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KnowledgeController extends Controller
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
     * Knowledge list, type article.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = DB::table('posts')->where('type', 'article')->get();

        return view('knowledge/index', ['posts' => $posts]);
    }

    /**
     * Detail knowledge
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function detail($id)
    {
        $post = DB::table('posts')->where('id', $id)->first();
        
        return view('knowledge/detail', ['post' => $post]);
    }

    /**
     * Video list
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function video()
    {
        $posts = DB::table('posts')->where('type', 'video')->get();

        return view('knowledge/video', ['posts' => $posts]);
    }
}
