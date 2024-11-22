<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();
        return view('roles.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoleRequest $request)
    {
        $validated = $request->validated();
        $role = Role::create($validated);
        return redirect()->route('roles.index')->with('success','สร้าง role ใหม่สำเร็จ');
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        return view('roles.show',compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        return view('roles.edit',compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Role $role,UpdateRoleRequest $request)
    {
        $oldData = $role->getOriginal();

        $newData = $request->validated();
        $diff = array_diff($newData, $oldData);
        $role->update($request->validated());

        return redirect()->route('roles.index')
        ->with('success','แก้ไขข้อมูล [' . implode(', ',array_keys($diff)) . '] เป็น [' . implode(', ', $newData) . '] สำเร็จ');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('roles.index')
        ->with('success','ลบ role สำเร็จ');
    }
}
