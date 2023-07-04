<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class RequestsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $requests = DB::table('request')->select('request.*', 'users.name')->join('users', 'users.id', '=', 'request.user_id')->where('request.deleted_at', null)->orderBy('request.id', 'desc')->paginate(10);

        return view('admin/requests/index', compact('requests'));
    }

    public function create()
    {
        $users = DB::table('users')->get();
        return view('admin/requests/create', compact('users'));
    }

    public function store(Request $request)
    {
        $post = $request->post();

        unset($post['_token']);
        unset($post['save']);

        $post['created_at'] = date('Y-m-d H:i:s');
        $post['user_id'] = Auth::user()->id;

        DB::table('request')->insert($post);
    
        $request->session()->flash('status', 'Successfully added.');

        return redirect('/admin/requests');
    }

    public function edit($id)
    {
        $request = DB::table('request')->where('id', $id)->first();
        $users = DB::table('users')->get();
        
        return view('admin/requests/edit', compact('request', 'users'));
    }

    public function update(Request $request)
    {
        $post = $request->post();

        unset($post['_token']);
        unset($post['save']);

        $post['updated_at'] = date('Y-m-d H:i:s');

        DB::table('request')->where('id', $post['id'])->update($post);
    
        $request->session()->flash('status', 'Successfully updated.');

        if ($request->post('save') == 'save') {
            return redirect('/admin/requests');
        }

        return back();
    }

    public function delete($id, Request $request)
    {
        DB::table('request')->where('id', $id)
                                 ->update(['deleted_at' => date('Y-m-d H:i:s')]);

        $request->session()->flash('status', 'Deleted.');

        return redirect('/admin/requests');        
    }
}