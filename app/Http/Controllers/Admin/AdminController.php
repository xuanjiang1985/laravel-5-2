<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Auth;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.auth.index');
    }

    public function getLogin()
    {
        return view('admin.auth.login');
    }

    public function getLogout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin');
    }

    public function postLogin(Request $request)
    {
        $this->validate($request, ['email' => 'required', 'password' => 'required']);
        if (Auth::guard('admin')->attempt(['email' => $request['email'], 'password' => $request['password'], 'admin_id' => 1])) {
            return redirect('/admin');
        } else {
            return back()->with('status','账号或密码错误。');
        }
        // $admin = Admin::find(1);
        // $user = User::find(1);
        //  Auth::guard('admins')->login($admin);
        //  return redirect('/admin');
     }
}
