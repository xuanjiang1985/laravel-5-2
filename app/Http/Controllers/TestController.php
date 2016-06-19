<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Session;
use Route;
use Auth;


class TestController extends Controller
{
    public function test(Request $request)
    {
        $id =  Session::getId();
        dd(Session::all());
    }

    public function name()
    {
        return $_GET['name'];
    }

    public function a()
    {
        return "a";
    }

    public function b()
    {
        return "b";
    }

    public function c()
    {
        return "c";
    }
}
