<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'role-create',
            'role-store',
            'role-edit',
            'role-update',
            'role-show',
            'role-destroy',
            'role-index',
            'permission-create',
            'permission-store',
            'permission-edit',
            'permission-update',
            'permission-show',
            'permission-destroy',
            'permission-index',
            'adminuser-create',
            'adminuser-store',
            'adminuser-edit',
            'adminuser-update',
            'adminuser-show',
            'adminuser-destroy',
            'adminuser-index',
            'filemanager-content',
            'filemanager-createDirectory',
            'filemanager-createFile',
            'filemanager-delete',    
            'filemanager-download', 
            'filemanager-fmButton',  
            'filemanager-initialize',
            'filemanager-paste',     
            'filemanager-preview',   
            'filemanager-rename',    
            'filemanager-selectDisk',
            'filemanager-streamFile',
            'filemanager-thumbnails',
            'filemanager-tree',
            'filemanager-unzip',
            'filemanager-updateFile',
            'filemanager-upload', 
            'filemanager-url',
            'filemanager-zip',
            'admin-index',
            'admin-media',
            'setting-index',
            'setting-update',
            'setting-themeSetting',
        ];
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission, 'guard_name'=>'admin']);
        }
    }
}
