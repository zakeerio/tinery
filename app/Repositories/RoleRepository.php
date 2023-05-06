<?php

namespace App\Repositories;
use App\Interfaces\RoleInterface;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleRepository implements RoleInterface{

    protected $role = null;

    public function __construct(Role $role){
        $this->role = $role;
    }
    
    public function getAll($order = 'id', $sort = 'desc', $columns = ['*'])
    {
        return $this->role->all($columns,$order,$sort);
    }

    public function store($params){
        $role = $this->role->create(['name' => $params['name']]);
        return $role;
    }

    public function update($params, $id){
        $role = $this->findRoleById($id);
        $role->name = $params['name'];
        $role->save();
        $role->syncPermissions($params['permission']);
        return $role;
    }

    public function destroy($id){
        return $this->role->where('id', $id)->delete();
    }

    public function findRoleById($id)
    {
        return $this->role->findOrFail($id);   
    }
}