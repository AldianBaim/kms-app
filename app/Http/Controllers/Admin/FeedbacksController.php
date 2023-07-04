<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class FeedbacksController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $feedbacks = DB::table('feedbacks')->select('feedbacks.*', 'users.name')->join('users', 'users.id', '=', 'feedbacks.user_id')->where('feedbacks.deleted_at', null)->orderBy('feedbacks.id', 'desc')->paginate(10);

        return view('admin/feedbacks/index', compact('feedbacks'));
    }

    public function create()
    {
        return view('admin/feedbacks/create');
    }

    public function store(Request $request)
    {
        $post = $request->post();

        unset($post['_token']);
        unset($post['save']);

        $post['created_at'] = date('Y-m-d H:i:s');
        $post['user_id'] = Auth::user()->id;

        DB::table('feedbacks')->insert($post);
    
        $request->session()->flash('status', 'Successfully added.');

        return redirect('/admin/feedbacks');
    }

    public function edit($id)
    {
        $feedback = DB::table('feedbacks')->where('id', $id)->first();
        
        return view('admin/feedbacks/edit', compact('feedback'));
    }

    public function update(Request $request)
    {
        $post = $request->post();

        unset($post['_token']);
        unset($post['save']);

        $post['updated_at'] = date('Y-m-d H:i:s');

        DB::table('feedbacks')->where('id', $post['id'])->update($post);
    
        $request->session()->flash('status', 'Successfully updated.');

        if ($request->post('save') == 'save') {
            return redirect('/admin/feedbacks');
        }

        return back();
    }

    public function delete($id, Request $request)
    {
        DB::table('feedbacks')->where('id', $id)
                                 ->update(['deleted_at' => date('Y-m-d H:i:s')]);

        $request->session()->flash('status', 'Deleted.');

        return redirect('/admin/feedbacks');        
    }
}