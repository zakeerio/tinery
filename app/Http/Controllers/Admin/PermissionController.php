<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Interfaces\PermissionInterface;

class PermissionController extends BaseController
{
    protected $permission = null;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(PermissionInterface $permission)
    {
        $this->middleware('auth:admin');
        $this->permission = $permission;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $this->setPageTitle("Permission","Permissions List");
        $permissions = $this->permission->getAll();
        return view('admin.permissions.index',compact('permissions'));
    }

    public function create()
    {
        $this->setPageTitle("Permissions","Create Permission");
        return view('admin.permissions.create');
    }

    public function store(Request $request)
    {
        $permission = $this->permission->store($request->except('_token'));
        
        if(!$permission){
			return $this->responseRedirectBack('Error occurred while creating permission', 'error', true, true);
		}
		return $this->responseRedirect('admin.permissions.index', 'Permission has been created successfully', 'success');
    }

    public function edit($id)
    {
        $this->setPageTitle("Permissions","Edit Permission");
        $permission = $this->permission->findPermissionById($id);
        return view('admin.permissions.edit',compact('permission'));
    }

    public function update(Request $request, $id)
    {
        $permission = $this->permission->update($request->except('_token'), $id);
        if(!$permission){
			return $this->responseRedirectBack('Error occurred while deleting permission', 'error', true, true);
		}
		return $this->responseRedirect('admin.permissions.index', 'Permission has been deleted successfully', 'success');
    }

    public function destroy($id)
    {
        $permission = $this->permission->destroy($id);
        
        if(!$permission){
			return $this->responseRedirectBack('Error occurred while deleting permission', 'error', true, true);
		}
		return $this->responseRedirect('admin.permissions.index', 'Permission has been deleted successfully', 'success');

    }
}
