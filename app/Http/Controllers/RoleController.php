<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index.show']]);
        $this->middleware('permission:role-create',['only' => ['create', 'store']]);
        $this->middleware('permission:role-edit',['only' => ['edit', 'update']]);
        $this->middleware('permission:role-delete',['only' => ['destroy']]);
    }

    public function index()
    {
        $title = "Role Lists";
        $roles = Role::orderBy('id','DESC')->paginate(5);
        return view('roles.index', compact('title', 'roles'));
    }

    public function create()
    {
        $title = "Add Role";
        $permissions = Permission::get();
        return view('roles.create', compact('title', 'permissions'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        request()->validate([
            'name' => 'required|unique:roles,name',
            'permission' => 'required'
        ]);

        $role = Role::create(['name' => $request->input('name')]);
        $role->syncPermissions($request->input('permission'));

        return redirect()->route('roles.index')->with('success','Role created successfully');
    }

    public function show($id)
    {
        $roles = Role::find($id);
        $rolePermission = Permission::join("role_has_permissions","role_has_permissions.permission_id", "=", "permissions.id")
                            ->where("role_has_permissions.role_id", $id)->get();
         return view('roles.show', compact('roles', 'rolePermission'));
    }

    public function edit($id)
    {
        $title = "Edit Role";
        $roles = Role::find($id);
        $permissions = Permission::get();
        $rolePermission = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
                        ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')->all();
        return view('roles.edit', compact('title','roles','permissions','rolePermission'));
    }

    public function update(Request $request, $id)
    {
        request()->validate([
            'name' => 'required',
            'permission' => 'required'
        ]);
        
        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();
        $role->syncPermissions($request->input('permission'));

        return redirect()->route('roles.index')->with('success','Role updated successfully');
    }

    public function destroy($id)
    {
        DB::table("roles")->where('id', $id)->delete();
        return redirect()->route('roles.index')->with('success','Role deleted successfully');
    }
}
