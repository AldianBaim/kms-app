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
        $files = DB::table('files')->select('files.*', 'users.name')->join('users', 'users.id', '=', 'files.user_id')->where('files.deleted_at', null)->orderBy('files.id', 'desc')->paginate(10);

        return view('admin/files/index', compact('files'));
    }

    public function create()
    {
        $users = DB::table('users')->get();
        return view('admin/files/create', compact('users'));
    }

    public function store(Request $request)
    {
        $post = $request->post();

        if ($request->hasFile('attachment')) {
            $attachment = $request->file('attachment')->getClientOriginalName();
            $request->attachment->storeAs('public/files/file', $attachment);
        }

        unset($post['_token']);
        unset($post['save']);

        $post['attachment'] = $attachment;
        $post['created_at'] = date('Y-m-d H:i:s');
        $post['user_id'] = Auth::user()->id;

        DB::table('files')->insert($post);
    
        $request->session()->flash('status', 'Successfully added.');

        return redirect('/admin/files');
    }

    public function edit($id)
    {
        $file = DB::table('files')->where('id', $id)->first();
        $users = DB::table('users')->get();
        
        return view('admin/files/edit', compact('file', 'users'));
    }

    public function update(Request $request)
    {
        $post = $request->post();

        if ($request->hasFile('attachment')) {
            $attachment = $request->file('attachment')->getClientOriginalName();
            $request->attachment->storeAs('public/files/file', $attachment);
            $post['attachment'] = $attachment;
        }

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