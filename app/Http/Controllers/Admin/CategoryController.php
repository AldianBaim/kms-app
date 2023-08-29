<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $categories = DB::table('category')->where('deleted_at', null)->orderBy('id', 'desc')->paginate(10);

        return view('admin/category/index', compact('categories'));
    }

    public function create()
    {
        return view('admin/category/create');
    }

    public function store(Request $request)
    {
        $post = $request->post();

        unset($post['_token']);
        unset($post['save']);

        $post['created_at'] = date('Y-m-d H:i:s');
        
        DB::table('category')->insert($post);
    
        $request->session()->flash('status', 'Successfully added.');

        return redirect('/admin/category');
    }

    public function edit($id)
    {
        $category = DB::table('category')->where('id', $id)->first();
        
        return view('admin/category/edit', compact('category'));
    }

    public function update(Request $request)
    {
        $post = $request->post();

        unset($post['_token']);
        unset($post['save']);

        $post['updated_at'] = date('Y-m-d H:i:s');

        DB::table('category')->where('id', $post['id'])->update($post);
    
        $request->session()->flash('status', 'Successfully updated.');

        if ($request->post('save') == 'save') {
            return redirect('/admin/category');
        }

        return back();
    }

    public function delete($id, Request $request)
    {
        DB::table('category')->where('id', $id)
                             ->update(['deleted_at' => date('Y-m-d H:i:s')]);

        $request->session()->flash('status', 'Deleted.');

        return redirect('/admin/category');        
    }
}