<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CriticController extends Controller
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
        return view('critic.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'subject' => 'required',
            'message' => 'required',
        ]);

        DB::table('feedbacks')->insert([
            'user_id' => Auth::user()->id,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        $request->session()->flash('status', 'Kritik dan saran berhasil diajukan');
        
        return redirect('/kritik-dan-saran');
    }
}
