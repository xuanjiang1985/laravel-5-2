<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use App\Permession;
use Log;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
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
        $ip = $_SERVER['REMOTE_ADDR'];
        if (Auth::guard('admin')->attempt(['email' => $request['email'], 'password' => $request['password'], 'admin_id' => 1])) {
            Log::info('管理员 '.$request['email'].' 登陆成功 '.$ip);
            return redirect()->route('admin');
        } else {
            Log::warning('管理员 '.$request['email'].' 尝试登陆失败 '.$ip);
            return back()->with('status','账号或密码错误。');
        }
        // $admin = Admin::find(1);
        // $user = User::find(1);
        //  Auth::guard('admins')->login($admin);
        //  return redirect('/admin');
     }
     public function permessionIndex()
     {
        $permessions = Permession::orderBy('sort_id','desc')->get();
        return view('admin.permession.index',['permessions' => $permessions]);
     }
     public function permessionCreate()
     {
        return view('admin.permession.create');
     }

     public function permessionStore(Request $request)
     {
        $this->validate($request, ['route' => 'required|unique:permessions,route_name','man' => 'required']);
        Permession::create(['route_name' => $request->input('route'),
                            'man_name' => $request->input('man')]);
        return redirect()->route('permession')->withSuccess('添加成功。');
     }
     public function permessionSort($id)
     {
        Permession::findOrFail($id)->update(['sort_id' => $_GET['value']]);
        return json_encode(['s' => 1]);
     }

     public function permessionItem($id)
     {
        Permession::findOrFail($id)->update(['item_id' => $_GET['value']]);
        return json_encode(['s' => 1]);
     }

     public function permessionShow($id)
     {
        $permession = Permession::findOrFail($id);
        return view('admin.permession.show',['permession' => $permession]);
     }

     public function permessionUpdate(Request $request, $id)
     {
        $this->validate($request, ['route' => 'required','man' => 'required']);
        Permession::findOrFail($id)->update(['route_name' => $request->input('route'),
                                            'man_name' => $request->input('man')]);
        return redirect()->route('permession')->withSuccess('修改成功。');
     }

     public function permessionDestroy($id)
     {
        Permession::findOrFail($id)->delete();
        return redirect()->route('permession')->withSuccess('删除成功。');
     }
}
