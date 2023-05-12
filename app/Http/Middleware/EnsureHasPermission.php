<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureHasPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $routeArray = $request->route()->getAction();
        if(isset($routeArray['controller'])){
            $controllerAction = class_basename($routeArray['controller']);
            list($controller, $action) = explode('@', $controllerAction);
            $permissionName = str_replace('controller','',strtolower($controller)).'-'.$action;
            dd($permissionName);
            
            // dd(\Auth::user()->roles[0]->hasPermissionTo($permissionName));
            
            $permissionExists = \DB::table('permissions')->where('name',$permissionName)->count();
            
            if($permissionExists < 1){
                \App::abort(403, 'User does not have the right permissions.');
            }

            if (\Auth::user()->roles[0]->hasPermissionTo($permissionName))
            {
                return $next($request);
            }else{
                \App::abort(403, 'User does not have the right permissions.');
            }
        }
         return $next($request);
    }
}
