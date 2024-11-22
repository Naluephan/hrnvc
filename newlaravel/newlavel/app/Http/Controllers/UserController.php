<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Gate::allows("view",["SADM", User::class])) {
            $users = User::all();
            return view('users.index',compact('users'));
        }else{

        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $validated = $request->validated();
        $user = User::create($validated);
        return redirect()->route('users.index')->with('success','สร้าง user ใหม่สำเร็จ');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(User $user,UpdateUserRequest $request)
    {
        $oldData = $user->getOriginal();

        $newData = $request->validated();
        $diff = array_diff($newData, $oldData);
        $user->update($request->validated());

        return redirect()->route('users.index')
        ->with('success','แก้ไขข้อมูล [' . implode(', ',array_keys($diff)) . '] เป็น [' . implode(', ', $newData) . '] สำเร็จ');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')
        ->with('success','ลบ user สำเร็จ');
    }
}
