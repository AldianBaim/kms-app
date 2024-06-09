<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        return view('setting.index', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'role_name' => 'required',
        ]);

        if ($request->hasFile('avatar')) {
            $new_avatar = $request->file('avatar')->getClientOriginalName();
            $request->avatar->storeAs('public/image/avatar', $new_avatar);
        }

        $current_avatar = User::where('id', $id)->pluck('avatar');
        User::where('id', $id)->update([
            'name' => $request->name,
            'address' => $request->address,
            'avatar' => $new_avatar ?? $current_avatar[0],
            'job' => $request->job,
            'email' => $request->email,
            'role_name' => $request->role_name,
        ]);
        return back()->with('status', 'Successfully updated.');
    }
}
