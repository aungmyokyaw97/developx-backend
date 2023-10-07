<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Flash;
use App\Http\Controllers\AppBaseController;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Response;

class RoleController extends AppBaseController
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function index()
    {
        abort_unless(auth()->user()->hasPermissionTo('role'),401);
        $roles = Role::all();
        return view('backend.roles.index', compact('roles'));
    }

    public function create()
    {
        abort_unless(auth()->user()->hasPermissionTo('role'),401);
        $permissions = Permission::pluck('name', 'id');
        return view('backend.roles.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        $role = Role::create([
            'name' => $request->name,
            'guard_name' => 'admin'
        ]);
        $role->givePermissionTo($request->permissions);
        Flash::success('Role saved successfully.');

        return redirect(route('roles.index'));
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
        abort_unless(auth()->user()->hasPermissionTo('role'),401);
        $role = Role::findorFail($id);
        $permissions = Permission::pluck('name', 'id');
        $rolePermissions = $role->permissions()->pluck('name', 'id');
        foreach ($rolePermissions as $data) {
            $selected[] = $data;
        }
        
        if (empty($role)) {
            Flash::error('Role not found');

            return redirect(route('roles.index'));
        }

        return view('backend.roles.edit', compact('role', 'permissions', 'selected'));
    }

    public function update($id, Request $request)
    {
        $role = Role::findOrFail($id);

        if (empty($role)) {
            Flash::error('Role not found');

            return redirect(route('roles.index'));
        }
        $role->update(['name' => $request->name]);
        $role->syncPermissions($request->permissions);

        Flash::success('Role updated successfully.');

        return redirect(route('roles.index'));
    }

    public function destroy($id)
    {
        abort_unless(auth()->user()->hasPermissionTo('role'),401);
        $role = Role::findOrFail($id);
        
        if (empty($role)) {
            Flash::error('Role not found');

            return redirect(route('roles.index'));
        }
        
        $role->syncPermissions([]);
        $role->delete();
        Flash::error('Role deleted successfully.');

        return redirect(route('roles.index'));
    }
}