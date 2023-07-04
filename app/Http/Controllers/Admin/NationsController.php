<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class NationsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $nations = DB::table('nations')->where('deleted_at', null)->orderBy('id', 'desc')->paginate(10);

        return view('admin/nations/index', compact('nations'));
    }

    public function create()
    {
        return view('admin/nations/create');
    }

    public function store(Request $request)
    {
        $post = $request->post();

        unset($post['_token']);
        unset($post['save']);

        $post['created_at'] = date('Y-m-d H:i:s');
        $post['user_id'] = Auth::user()->id;

        DB::table('nations')->insert($post);
    
        $request->session()->flash('status', 'Successfully added.');

        return redirect('/admin/nations');
    }

    public function edit($id)
    {
        $nation = DB::table('nations')->where('id', $id)->first();
        
        return view('admin/nations/edit', compact('nation'));
    }

    public function update(Request $request)
    {
        $post = $request->post();

        unset($post['_token']);
        unset($post['save']);

        $post['updated_at'] = date('Y-m-d H:i:s');

        DB::table('nations')->where('id', $post['id'])->update($post);
    
        $request->session()->flash('status', 'Successfully updated.');

        if ($request->post('save') == 'save') {
            return redirect('/admin/nations');
        }

        return back();
    }

    public function delete($id, Request $request)
    {
        DB::table('nations')->where('id', $id)
                                 ->update(['deleted_at' => date('Y-m-d H:i:s')]);

        $request->session()->flash('status', 'Deleted.');

        return redirect('/admin/nations');        
    }
}