<?php

namespace App\Http\Controllers;

use App\DataTables\AdminDataTable;
use App\Http\Requests;
use Illuminate\Http\Request;
use Flash;
use App\Http\Controllers\AppBaseController;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Response;
use App\Models\Admin;

class AdminController extends AppBaseController
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(AdminDataTable $adminDataTable)
    {
        abort_unless(auth()->user()->hasPermissionTo('admin'),401);
        return $adminDataTable->render('backend.admins.index');
    }

    public function profile()
    {
        $admin = auth()->user();
        return view('backend.admins.profile',compact('admin'));
    }

    public function create()
    {
        abort_unless(auth()->user()->hasPermissionTo('admin'),401);
        $roles = Role::pluck('name', 'id');
        return view('backend.admins.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $input = [
            'role_id' => $request->role_id,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ];

        $admin = Admin::create($input);
        $admin->assignRole($request->role_id);
        Flash::success('Admin saved successfully.');

        return redirect(route('admins.index'));
    }

    public function show($id)
    {
        abort_unless(auth()->user()->hasPermissionTo('admin'),401);
        $admin = Admin::find($id);

        if (empty($admin)) {
            Flash::error('Admin not found');

            return redirect(route('admins.index'));
        }

        return view('backend.admins.show')->with('admin', $admin);
    }

    public function edit($id)
    {
        abort_unless(auth()->user()->hasPermissionTo('admin'),401);
        $admin = Admin::select('id', 'name', 'role_id', 'email')->findOrFail($id);
        $roles = Role::pluck('name', 'id');
        if (empty($admin)) {
            Flash::error('Admin not found');

            return redirect(route('admins.index'));
        }

        return view('backend.admins.edit', compact('admin', 'roles'));
    }

    public function profileUpdate(Request $request)
    {
        $admin = auth()->user();
        $admin->name = $request->name;
        $admin->role_id = $request->role_id;
        $admin->email = $request->email;
        if ($request->filled('password')){
            $admin->password =  Hash::make($request->password);
        }
        $admin->update();

        Flash::success('Admin updated successfully.');

        return redirect(route('home'));
    }

    public function update($id, Request $request)
    {
        $admin = Admin::findOrFail($id);
        $admin->name = $request->name;
        $admin->role_id = $request->role_id;
        $admin->email = $request->email;
        if ($request->filled('password')){
            $admin->password =  Hash::make($request->password);
        }
        $admin->update();
        $admin->syncRoles($request->role_id);

        Flash::success('Admin updated successfully.');

        return redirect(route('admins.index'));
    }

    public function destroy($id)
    {
        abort_unless(auth()->user()->hasPermissionTo('admin'),401);
        $admin = Admin::find($id);

        if (empty($admin)) {
            Flash::error('Admin not found');

            return redirect(route('admins.index'));
        }

        tap($admin)->syncRoles($admin->role_id)->delete($id);

        Flash::success('Admin deleted successfully.');

        return redirect(route('admins.index'));
    }
}
