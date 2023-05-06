<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Models\Admin;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use App\Interfaces\AdminInterface;

class AdminUserController extends BaseController
{

    protected $admin = null;

    public function __construct(AdminInterface $admin){
        $this->admin = $admin;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->setPageTitle("Users","Users List");
        $data = $this->admin->getAll();
        return view('admin.admins.index',compact('data'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->setPageTitle("Users","Create User");
        $roles = Role::pluck('name','name')->all();
        return view('admin.admins.create',compact('roles'));
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
            'name' => 'required',
            'email' => 'required|email|unique:admins,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]);
        
        $user = $this->admin->store($request->except('_token'));
        if(!$user){
			return $this->responseRedirectBack('Error occurred while creating user', 'error', true, true);
		}
		return $this->responseRedirect('admin.admins.index', 'User has been created successfully', 'success');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->setPageTitle("Users","View User");
        $user = Admin::findOrFail($id);
        return view('admin.admins.show',compact('user'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->setPageTitle("Users","Edit User");
        $user = $this->admin->findAdminById($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
    
        return view('admin.admins.edit',compact('user','roles','userRole'));
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
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password',
            'roles' => 'required'
        ]);

        $user = $this->admin->update($request->except('_token'), $id);
        if(!$user){
			return $this->responseRedirectBack('Error occurred while updating user', 'error', true, true);
		}
		return $this->responseRedirect('admin.admins.index', 'User has been updated successfully', 'success');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = $this->admin->destroy($id);
        if(!$user){
			return $this->responseRedirectBack('Error occurred while deleting user', 'error', true, true);
		}
		return $this->responseRedirect('admin.admins.index', 'User has been deleted successfully', 'success');
    }
}
