<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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
    public function index(Request $request)
    {
        $category = $request->input('category', null);

        if ($category) {
            $posts = DB::table('posts')->where(['type' => 'article', 'status' => 'Diterima', 'category' => $category])->orderBy('id', 'desc')->get();
        } else {
            $posts = DB::table('posts')->where(['type' => 'article', 'status' => 'Diterima'])->orderBy('id', 'desc')->get();
        }

        $categories = DB::table('category')->where(['deleted_at' => null])->get();

        return view('knowledge/index', ['posts' => $posts, 'categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('knowledge.create');
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
            'title' => 'required',
            'type' => 'required',
            'cover' => 'required',
            'content' => 'required',
            'attachment' => 'required'
        ]);

        if ($request->hasFile('attachment')) {
            $attachment = $request->file('attachment')->getClientOriginalName();
            $request->attachment->storeAs('public/files/knowledge', $attachment);
        }
        if ($request->hasFile('cover')) {
            $cover = $request->file('cover')->getClientOriginalName();
            $request->cover->storeAs('public/files/knowledge', $cover);
        }

        DB::table('posts')->insert([
            'user_id' => Auth::user()->id,
            'title' => $request->title,
            'cover' => $cover,
            'type' => $request->type,
            'content' => $request->content,
            'status' => 'Ditunda',
            'attachment' => $attachment,
            'total_read' => 0,
            'created_at' => date('Y-m-d H:i:s')
        ]);

        $request->session()->flash('status', 'Konten berhasil dikirim, menunggu approval dari admin.');

        return redirect('/knowledge/create');
    }

    /**
     * Detail knowledge
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function detail($id)
    {
        $post = DB::table('posts')->where('id', $id)->first();

        // Increase 1 read.
        DB::table('posts')->where('id', $id)->increment('total_read');

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
        $categories = DB::table('category')->where(['deleted_at' => null])->get();

        return view('knowledge/video', ['posts' => $posts, 'categories' => $categories]);
    }

    /**
     * Photo list
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function photo()
    {
        $posts = DB::table('posts')->where('type', 'photo')->get();
        $categories = DB::table('category')->where(['deleted_at' => null])->get();

        return view('knowledge/photo', ['posts' => $posts, 'categories' => $categories]);
    }
}
