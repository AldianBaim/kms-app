<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PredictionController extends Controller
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
     * Prediction Feature.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $predictions = array_map('str_getcsv', file(storage_path('Prediction.csv')));
        
        return view('prediction.index', ['predictions' => $predictions]);
    }
}
