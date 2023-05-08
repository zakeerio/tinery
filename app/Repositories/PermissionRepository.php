<?php

namespace App\Repositories;
use App\Interfaces\PermissionInterface;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionRepository implements PermissionInterface{

    protected $permission = null;

    public function __construct(Permission $permission){
        $this->permission = $permission;
    }

    public function getAll($order = 'id', $sort = 'desc', $columns = ['*'])
    {
        return $this->permission->all($columns,$order,$sort);
    }

    public function store($params){
        $params['gaurd_name'] = "admin";
        $permission = $this->permission->create($params);
        if($permission){

            $role = Role::where('name','Super Admin')->first();
            $permissions = Permission::pluck('id','id')->all();
            // $role->syncPermissions($permissions);
            $role->givePermissionTo($permissions);
        }
        return $permission;
    }

    public function update($params, $id){
        $permission = $this->findPermissionById($id);
        $permission->name = $params['name'];
        $permission->save();
        return $permission;
    }

    public function destroy($id){

        $permission = Permission::select('name')->where('id',$id)->first();
        // $params['gaurd_name'] = "admin";
        // $permission = $this->permission->create($params);
        if($permission){

            $roles = Role::all();
            foreach($roles as $role) {
                if($role->hasPermissionTo($permission['name'])){
                    $role->revokePermissionTo($permission['name']);
                }
            }
        }

        return Permission::where('id', $id)->delete();

    }

    public function findPermissionById($id)
    {
        return $this->permission->findOrFail($id);
    }
}

