<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use function Pest\Laravel\swap;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all roles from the database
        $roles = Role::with('Permissions')->latest()->get();
        // return $roles;
        // Return the roles to the view
        return view('backend.pages.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Return the view to create a new role
        $permissions = Permission::get();
        return view('backend.pages.roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|unique:roles,name',
            'permission' => 'required',
        ]);

        $permissionId = array_map('intval', $request->input('permission'));

        $role = Role::create(['name' => $request->input('name')]);
        $role->syncPermissions($permissionId);
        flash()->success('Role Created Successfully');
        return redirect()->route('roles.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $permissions = Permission::all();
        $role = Role::with('Permissions')->findOrFail($id);

        $rolePermissions = $role->Permissions->pluck('id')->all();

        return view('backend.pages.roles.edit', compact('role', 'permissions', 'rolePermissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|unique:roles,name,' . $id,
            'permission' => 'required',
        ]);

        $role = Role::findOrFail($id);
        $role->name = $request->input('name');
        $role->save();

        $permissionId = array_map('intval', $request->input('permission'));
        $role->syncPermissions($permissionId);
        flash()->success('Role Updated Successfully');
        return redirect()->route('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
    //    if (auth()->user()->hasRole('Admin')) {
    //         $role = Role::findOrFail($id);
    //         $role->delete();
    //         sweetalert()->success('Role Deleted Successfully');
    //         return redirect()->route('roles.index');
    //     } else {
    //         flash()->error('You are not authorized to delete this role');
    //         return redirect()->back();
    //     }
    Role::find($id)->delete();
        sweetalert()->success('Role deleted successfully.');
        return redirect()->back();
    }
}
