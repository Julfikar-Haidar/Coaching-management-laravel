<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\slider;

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
        $slider=slider::where('slide_status',1)->get();
        return view('admin.home.home',compact('slider'));
    }
}
