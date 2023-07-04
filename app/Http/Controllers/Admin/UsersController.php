<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = DB::table('users')->where('deleted_at', null)->orderBy('id', 'desc')->paginate(10);

        return view('admin/users/index', compact('users'));
    }

    public function create()
    {
        return view('admin/users/create');
    }

    public function store(Request $request)
    {
        $post = $request->post();

        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar')->getClientOriginalName();
            $request->avatar->storeAs('public/image/avatar', $avatar);
        }

        unset($post['_token']);
        unset($post['save']);

        $post['avatar'] = $avatar;
        $post['created_at'] = date('Y-m-d H:i:s');
        
        DB::table('users')->insert($post);
    
        $request->session()->flash('status', 'Successfully added.');

        return redirect('/admin/users');
    }

    public function edit($id)
    {
        $user = DB::table('users')->where('id', $id)->first();
        
        return view('admin/users/edit', compact('user'));
    }

    public function update(Request $request)
    {
        $post = $request->post();

        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar')->getClientOriginalName();
            $request->avatar->storeAs('public/image/avatar', $avatar);
            $post['avatar'] = $avatar;
        }

        unset($post['_token']);
        unset($post['save']);

        $post['updated_at'] = date('Y-m-d H:i:s');

        DB::table('users')->where('id', $post['id'])->update($post);
    
        $request->session()->flash('status', 'Successfully updated.');

        if ($request->post('save') == 'save') {
            return redirect('/admin/users');
        }

        return back();
    }

    public function delete($id, Request $request)
    {
        DB::table('users')->where('id', $id)
                                 ->update(['deleted_at' => date('Y-m-d H:i:s')]);

        $request->session()->flash('status', 'Deleted.');

        return redirect('/admin/users');        
    }
}