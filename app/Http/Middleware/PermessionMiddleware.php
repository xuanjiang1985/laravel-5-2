<?php

namespace App\Http\Middleware;

use Closure;
use App\UserRole;
use App\RolePermession;
use App\Permession;
use Auth;
use Route;

class PermessionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::guard('admin')->user();
        $user_role = UserRole::where('user_id',$user->id)->first();
        if ($user_role == null) {
            return abort(403);
        } else {
            //超级管理员 UserRole->roel_id = 1
            if ($user_role->role_id == 1) {
                return $next($request);
            } else {
                //非超级管理员
                $permessions = RolePermession::where('role_id',$user_role->role_id)->lists('permession_id')->toArray();
                $route_name = Route::getCurrentRoute()->getName();
                $route_name_id = Permession::where('route_name',$route_name)->first()->id;
                if (in_array($route_name_id, $permessions)) {
                    return $next($request);
                } else {
                    abort(403);
                }
            }
        }
        return $next($request);
    }
}
