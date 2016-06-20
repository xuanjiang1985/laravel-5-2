<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use App\Role;
use App\UserRole;
use Hash;
use Log;

class ManagerController extends Controller
{
    public function passwordChange()
    {
        return view('admin.manager.passwordChange');
    }

    public function passwordUpdate(Request $request)
    {
        $this->validate($request,['密码' => 'required|min:8|confirmed']);
        $ip = $_SERVER['REMOTE_ADDR'];
        $user = Auth::guard('admin')->user();
        $user->update(['password' => Hash::make($request->input('密码'))]);
        Log::info('管理员 '.$user->email.' 修改了密码 '.$ip);
        return redirect()->route('admin')->withSuccess('密码修改成功。');
    }

    public function index()
    {
        $managers = User::where('admin_id',1)->get();
        return view('admin.manager.index',['managers' => $managers]);
    }

    public function create()
    {
        return view('admin.manager.create');
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('admin.manager.show', ['user' => $user]);
    }

    public function update(Request $request, $id)
    {
    
        $find_users = User::where('email',$request->input('账户'))->get();
        if (count($find_users) > 1) {
            return back()->withErrors('该账户已存在');
        }

        if (count($find_users) == 1 && $find_users->first()->id != $id) {
            return back()->withErrors('该账户已存在');
        }

        if ($request->input('密码') == '') {
            $this->validate($request,['姓名' => 'required',
                                    '账户' => 'required|email',
                                    ]);
            User::find($id)->update(['name' => $request->input('姓名'),
                                    'email' => $request->input('账户'),
                            ]);
        } else {
            $this->validate($request,['姓名' => 'required',
                                    '账户' => 'required|email',
                                    '密码' => 'required|min:8']);
            User::find($id)->update(['name' => $request->input('姓名'),
                                'email' => $request->input('账户'),
                                'password' => Hash::make($request->input('密码')),
                            ]);
        }
    
        $ip = $_SERVER['REMOTE_ADDR'];
        $user = Auth::guard('admin')->user();
        Log::info('管理员 '.$user->email.' 修改后台管理用户, 其ID为 '.$id.' '.$ip);
        return redirect()->route('manager')->withSuccess('编辑管理员成功。');
    }

    public function store(Request $request)
    {
        $this->validate($request,['姓名' => 'required',
                                    '账户' => 'required|unique:users,email',
                                    '密码' => 'required|min:8|confirmed']);
        User::create(['name' => $request->input('姓名'),
                        'admin_id' => 1,
                        'email' => $request->input('账户'),
                        'password' => Hash::make($request->input('密码')),
                    ]);
        $ip = $_SERVER['REMOTE_ADDR'];
        $user = Auth::guard('admin')->user();
        Log::info('管理员 '.$user->email.' 创建了后台管理用户 '.$request->input('账户').' '.$ip);
        return redirect()->route('manager')->withSuccess('添加管理员成功。');
    }

    public function branch($id)
    {
        $manager = User::findOrFail($id);
        $roles = Role::all();
        return view('admin.manager.branch',['manager' => $manager, 'roles' => $roles]);
    }
    
    public function branchStore(Request $request, $id)
    {
        $this->validate($request, ['分组' => 'required']);
        $role_id = $request['分组'];
        if ($id == 1) {
            return abort(403);
        }
        $user = Auth::guard('admin')->user();
        $ip = $_SERVER['REMOTE_ADDR'];
        if ($user->id == $id) {
            return redirect()->route('manager')->withErrors('无法给自己分组！');
        }
        if ($role_id == 0) {
            UserRole::where('user_id',$id)->delete();
            Log::info('管理员 '.$user.' 分组了后台管理用户,id='.$id.' '.$ip);
            return redirect()->route('manager')->withSuccess('分组操作成功。');
        } else {
            UserRole::where('user_id',$id)->delete();
            UserRole::create(['user_id' => $id, 'role_id' => $role_id]);
            Log::info('管理员 '.$user.' 分组了后台管理用户,id='.$id.' '.$ip);
            return redirect()->route('manager')->withSuccess('分组操作成功。');
        }
    }

    public function delete($id)
    {
        if ($id == 1) {
            return redirect()->route('manager')->withErrors('无法删除系统指定的管理员！');
        }
        $find_user = User::findOrFail($id);
        $ip = $_SERVER['REMOTE_ADDR'];
        $user = Auth::guard('admin')->user();
        if ($user->id == $id) {
            return redirect()->route('manager')->withErrors('无法删除自己！');
        }
        Log::info('管理员 '.$user.' 删除了后台管理用户 '.$find_user.' '.$ip);
        $find_user->delete();
        return redirect()->route('manager')->withSuccess('添加管理员成功。');
    }
}
