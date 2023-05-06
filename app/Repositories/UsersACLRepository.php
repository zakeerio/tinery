<?php

namespace App\Repositories;

use Alexusmai\LaravelFileManager\Services\ACLService\ACLRepository;

class UsersACLRepository implements ACLRepository
{
    /**
     * Get user ID
     *
     * @return mixed
     */
    public function getUserID()
    {
        return \Auth::id();
    }

    /**
     * Get ACL rules list for user
     *
     * @return array
     */
    public function getRules(): array
    {
        if(!\Auth::guard('admin')->user()){
            return abort(404);
        }

        $routeArray = request()->route()->getAction();
        if(isset($routeArray['controller'])){
            $controllerAction = class_basename($routeArray['controller']);
            list($controller, $action) = explode('@', $controllerAction);
            $permissionName = str_replace('controller','',strtolower($controller)).'-'.$action;
            $permissionExists = \DB::table('permissions')->where('name',$permissionName)->count();
        
            if($permissionExists < 1){
                \App::abort(403, 'User does not have the right permissions.');
            }
            if (\Auth::guard('admin')->user()->roles[0]->hasPermissionTo($permissionName))
            {
                return [
                    ['disk' => 'media', 'path' => '*', 'access' => 2],
                ];
            }else{
                \App::abort(403, 'User does not have the right permissions.');
            }
        }
    }
}
