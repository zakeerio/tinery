<?php

namespace App\Repositories;
use App\Interfaces\AdminInterface;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use Illuminate\Support\Arr;

class AdminRepository implements AdminInterface{

    protected $admin = null;

    public function __construct(Admin $admin){
        $this->admin = $admin;
    }
    
    public function getAll($order = 'id', $sort = 'desc', $columns = ['*'])
    {
        return $this->admin->all($columns,$order,$sort);
    }

    public function store($params){
        $params['password'] = Hash::make($params['password']);
        $user = $this->admin->create($params);
        if($user){ $user->assignRole($params['roles']);}
        return $user;
    }

    public function update($params,$id){
        if(!empty($params['password'])){ 
            $params['password'] = Hash::make($params['password']);
        }else{
            $params = Arr::except($params,array('password'));    
        }
        $user = $this->findAdminById($id);
        $user->update($params);
        $user->syncRoles($params['roles']);
        return $user;
    }

    public function destroy($id){
        $user = $this->findAdminById($id);
        $user->delete();
        return $user;
    }

    public function findAdminById($id)
    {
        return $this->admin->findOrFail($id);
    }
}