<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class FilesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $files = DB::table('files')->where('deleted_at', null)->orderBy('id', 'desc')->paginate(10);

        return view('admin/files/index', compact('files'));
    }

    public function create()
    {
        return view('admin/files/create');
    }

    public function store(Request $request)
    {
        $post = $request->post();

        unset($post['_token']);
        unset($post['save']);

        $post['created_at'] = date('Y-m-d H:i:s');
        $post['user_id'] = Auth::user()->id;

        DB::table('files')->insert($post);
    
        $request->session()->flash('status', 'Successfully added.');

        return redirect('/admin/files');
    }

    public function edit($id)
    {
        $file = DB::table('files')->where('id', $id)->first();
        
        return view('admin/files/edit', compact('file'));
    }

    public function update(Request $request)
    {
        $post = $request->post();

        unset($post['_token']);
        unset($post['save']);

        $post['updated_at'] = date('Y-m-d H:i:s');

        DB::table('files')->where('id', $post['id'])->update($post);
    
        $request->session()->flash('status', 'Successfully updated.');

        if ($request->post('save') == 'save') {
            return redirect('/admin/files');
        }

        return back();
    }

    public function delete($id, Request $request)
    {
        DB::table('files')->where('id', $id)
                                 ->update(['deleted_at' => date('Y-m-d H:i:s')]);

        $request->session()->flash('status', 'Deleted.');

        return redirect('/admin/files');        
    }
}