<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ForumController extends Controller
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
     * Forum.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $threads = DB::table('forum')->orderBy('id', 'desc')->get();
        $categories = DB::table('category')->where(['deleted_at' => null])->get();

        return view('forum/index', ['threads' => $threads, 'categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('forum.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'thread_name' => 'required',
            'category' => 'required',
            'thread_content' => 'required'
        ]);

        DB::table('forum')->insert([
            'user_id' => Auth::user()->id,
            'thread_name' => $request->thread_name,
            'category' => $request->category,
            'thread_content' => $request->thread_content,
            'created_at' => date('Y-m-d H:i:s')
        ]);

        $request->session()->flash('status', 'Berhasil membuat diskusi baru.');

        return redirect('/forum');
    }

    /**
     * Detail Forum
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function detail($id)
    {

        $thread = DB::table('forum')->where('id', $id)->first();

        return view('forum/detail', ['thread' => $thread]);
    }
}
