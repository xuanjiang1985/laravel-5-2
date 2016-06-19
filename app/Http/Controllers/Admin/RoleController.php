<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Role;
use App\Permession;
use App\RolePermession;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('admin.role.index',['roles' => $roles]);
    }

    public function create()
    {
        return view('admin.role.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,['权限组名' => 'required']);
        Role::create(['name' => $request->input('权限组名')]);
        return redirect()->route('role')->withSuccess('添加成功。');
    }

    public function show($id)
    {
        $role = Role::findOrFail($id);
        return view('admin.role.show',['role' => $role]);
    }

    public function update(Request $request, $id)
    {
        if($id == 1) {
            return abort(403);
        }
        $this->validate($request,['权限组名' => 'required']);
        Role::find($id)->update(['name' => $request->input('权限组名')]);
        return redirect()->route('role')->withSuccess('修改成功。');
    }


    public function distribute($id)
    {
        if($id == 1) {
            return abort(403);
        }
        $item_1 = Permession::where('item_id',1)->orderBy('sort_id','desc')->get();
        $role_permession = RolePermession::where('role_id',$id)->lists('permession_id')->toArray();
        $role = Role::find($id);
        return view('admin.role.distribute',['item_1' => $item_1,
                                             'role_permession' => $role_permession,
                                             'role' => $role
                                             ]);
    }

    public function distributeStore(Request $request, $id)
    {
        if($id == 1) {
            return abort(403);
        }
        $chkvalue = $request->input('chkvalue');
        RolePermession::where('role_id',$id)->delete();
        if ($chkvalue == null) {
            return redirect()->route('role')->withSuccess("分配权限成功。");
        } else {
            foreach ($chkvalue as $key => $value) {
                RolePermession::create(['role_id' => $id, 'permession_id' => $value]);
            }
            return redirect()->route('role')->withSuccess("分配权限成功。");
        }
        
    }

    public function delete($id)
    {
        if($id == 1) {
            return abort(403);
        }
        Role::findOrFail($id)->delete();
        return redirect()->route('role')->withSuccess('删除成功。');
    }
}
