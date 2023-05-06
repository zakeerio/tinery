<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\BaseController;
use DB;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Interfaces\RoleInterface;
use App\Interfaces\PermissionInterface;


class RoleController extends BaseController
{

    protected $role,$permissionI;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(RoleInterface $role, PermissionInterface $permissionI)
    {
        $this->role = $role;
        $this->permissionI = $permissionI;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->setPageTitle("Roles","Role Management");
        $roles = $this->role->getAll();
        return view('admin.roles.index', compact('roles'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->setPageTitle("Roles","Create Role");
        $permission = $this->permissionI->getAll();
        return view('admin.roles.create', compact('permission'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'permission' => 'required',
        ]);
        $role = $this->role->store($request->except('_token'));
        if(!$role){
            return $this->responseRedirectBack('Error occurred while creating role', 'error', true, true);
		}
        $role->syncPermissions($request->input('permission'));
		return $this->responseRedirect('admin.roles.index', 'Role has been created successfully', 'success');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->setPageTitle("Roles","View Role");
        $role = $this->role->findRoleById($id);
        $rolePermissions = Permission::join("role_has_permissions", "role_has_permissions.permission_id", "=", "permissions.id")
            ->where("role_has_permissions.role_id", $id)
            ->get();
        return view('admin.roles.show', compact('role', 'rolePermissions'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->setPageTitle("Roles","Edit Role");
        $role = $this->role->findRoleById($id);
        $permission = $this->permissionI->getAll();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id", $id)
            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
            ->all();
        return view('admin.roles.edit', compact('role', 'permission', 'rolePermissions'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'permission' => 'required',
        ]);

        $role = $this->role->update($request->except('_token'),$id);
        if(!$role){
            return $this->responseRedirectBack('Error occurred while updating role', 'error', true, true);
		}
		return $this->responseRedirect('admin.roles.index', 'Role has been updated successfully', 'success');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = $this->role->destroy($id);
        if(!$role){
            return $this->responseRedirectBack('Error occurred while deleting role', 'error', true, true);
		}
		return $this->responseRedirect('admin.roles.index', 'Role has been deleted successfully', 'success');
    }
}
