<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resources;

class HomeController extends Controller
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
        $topics  = Resources::select('category_name')
                 ->distinct('category_name')
                 ->orderBy('category_name','asc')
                 ->get();

        return view('home', ['topics' => $topics]);
    }
    
}
