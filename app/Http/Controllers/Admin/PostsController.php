<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $posts = DB::table('posts')->select('posts.*', 'users.name')->join('users', 'users.id', '=', 'posts.user_id')->where('posts.deleted_at', null)->orderBy('posts.id', 'desc')->paginate(10);
        return view('admin/posts/index', compact('posts'));
    }

    public function create()
    {
        $users = DB::table('users')->get();
        $categories = DB::table('category')->where(['deleted_at' => null])->get();

        return view('admin/posts/create', compact('users', 'categories'));
    }

    public function store(Request $request)
    {
        $post = $request->post();

        if ($request->hasFile('attachment')) {
            $attachment = $request->file('attachment')->getClientOriginalName();
            $request->attachment->storeAs('public/files/knowledge', $attachment);
        }
        if ($request->hasFile('cover')) {
            $cover = $request->file('cover')->getClientOriginalName();
            $request->cover->storeAs('public/files/knowledge', $cover);
        }

        unset($post['_token']);
        unset($post['save']);

        $post['attachment'] = $attachment;
        $post['cover'] = $cover;
        $post['created_at'] = date('Y-m-d H:i:s');
        $post['user_id'] = Auth::user()->id;

        DB::table('posts')->insert($post);
    
        $request->session()->flash('status', 'Successfully added.');

        return redirect('/admin/posts');
    }

    public function edit($id)
    {
        $post = DB::table('posts')->where('id', $id)->first();
        $categories = DB::table('category')->where(['deleted_at' => null])->get();
        
        return view('admin/posts/edit', compact('post', 'categories'));
    }

    public function update(Request $request)
    {
        $post = $request->post();

        if ($request->hasFile('attachment')) {
            $attachment = $request->file('attachment')->getClientOriginalName();
            $request->attachment->storeAs('public/files/knowledge', $attachment);
            $post['attachment'] = $attachment;
        }
        if ($request->hasFile('cover')) {
            $cover = $request->file('cover')->getClientOriginalName();
            $request->cover->storeAs('public/files/knowledge', $cover);
            $post['cover'] = $cover;
        }

        unset($post['_token']);
        unset($post['save']);

        $post['updated_at'] = date('Y-m-d H:i:s');

        DB::table('posts')->where('id', $post['id'])->update($post);
    
        $request->session()->flash('status', 'Successfully updated.');

        if ($request->post('save') == 'save') {
            return redirect('/admin/posts');
        }

        return back();
    }

    public function delete($id, Request $request)
    {
        DB::table('posts')->where('id', $id)
                                 ->update(['deleted_at' => date('Y-m-d H:i:s')]);

        $request->session()->flash('status', 'Deleted.');

        return redirect('/admin/posts');        
    }
}