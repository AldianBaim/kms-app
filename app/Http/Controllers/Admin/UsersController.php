<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
        $request->validate([
            'password' => 'min:6|required_with:password_confirm|same:password_confirm',
            'password_confirm' => 'min:6',
        ]);

        $post = $request->post();

        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar')->getClientOriginalName();
            $request->avatar->storeAs('public/image/avatar', $avatar);
        }

        unset($post['_token']);
        unset($post['save']);
        unset($post['password_confirm']);

        $post['avatar'] = $avatar;
        $post['password'] = Hash::make($post['password']);
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

        if($post['password'] != '' && $post['password_confirm']) {
            $request->validate([
                'password' => 'min:6|same:password_confirm',
                'password_confirm' => 'min:6',
            ]);
            $post['password'] = Hash::make($post['password']);
        } else {
            $post['password'] = $post['old_password'];
        }

        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar')->getClientOriginalName();
            $request->avatar->storeAs('public/image/avatar', $avatar);
            $post['avatar'] = $avatar;
        }

        unset($post['_token']);
        unset($post['save']);
        unset($post['password_confirm']);
        unset($post['old_password']);

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