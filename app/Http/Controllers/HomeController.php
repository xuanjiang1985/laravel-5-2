<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function jackcare()
    {
        return redirect('/')->withErrors('你没有权限');
    }

    public function home1()
    {
        return view('home1');
    }

    public function home2()
    {
        return view('home2');
    }
}
