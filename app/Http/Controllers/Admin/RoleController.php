<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use App\Models\RoleModule;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Auth;



class RoleController extends Controller 
// implements HasMiddleware
{
    // public static function middleware(): array
    // {
    //     return [
    //         new Middleware('admin.permission:manage role', only: ['index']),
    //         new Middleware('admin.permission:create role', only: ['create']),
    //         new Middleware('admin.permission:edit role', only: ['edit']),
    //         new Middleware('admin.permission:delete role', only: ['destroy']),
    //     ];
    // }
    public function index()
{
    $permissions = Permission::all();
    $roles = Role::with('permissions')->get();

    return view('admin.role.index', compact('roles', 'permissions'));
}
        public function create()
        {
            
            $permissions=Permission::all();
            $modules=RoleModule::all();
           
    
            return view('admin.role.create', compact('permissions','modules'));
        }
    
        
public function store(Request $request)
{
    // $admin = auth()->guard('admin')->user();
    
    
    // $role = $admin ? \App\Models\Role::find($admin->role) : null;

   
    // if (!$role || $role->name !== 'superadmin') {
    //     return redirect()->route('admin.role.index')->with('error', 'Only Super Admin can add roles.');
    // }

    $request->validate([
        'name' => 'required|string|unique:roles,name',
        'permissions' => 'required|array',
    ]);

    $role = Role::create(['name' => $request->name]);

    
    foreach ($request->permissions as $permissionName) {
        Permission::firstOrCreate(['name' => $permissionName]);
    }

    
    $role->syncPermissions($request->permissions);

    
    return redirect()->route('admin.role.index')->with('success' , 'Role and permissions created successfully');
}
        
public function destroy($id)
{
    $role = Role::findOrFail($id);
    $role->delete();

    return redirect()->back()->with('success', 'Role deleted successfully.');
}    

public function edit($id)
{
    
    $modules=RoleModule::all();
    $role = Role::findOrFail($id);
   
    return view('admin.role.edit', compact('role','modules'));
}  

public function update(Request $request, $id)
    {
        
      
        $request->validate([
            'name' => 'required|string|max:255',
            'permissions' => 'required|array|min:1', 
        ]);

      
        $role = Role::findOrFail($id);

       
        $role->update([
            'name' => $request->name, 
        ]);

        
        $permissions = $request->permissions;
       
        $permissionIds = [];
        foreach ($permissions as $perm) {
            $permission = Permission::where('name', $perm)->first();
            if ($permission) {
                $permissionIds[] = $permission->id;
            }
        }

      
        $role->permissions()->sync($permissionIds);

        return redirect()->route('admin.role.index')->with('success', 'Role updated successfully.');
    }

   

}
