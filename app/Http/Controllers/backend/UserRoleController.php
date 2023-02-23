<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;

class UserRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userRoles = UserRole::latest()->get();
        return view('backend.pages.user_role.all_user_role', compact('userRoles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        $users = User::all();
        return view('backend.pages.user_role.create_user_role', compact('roles', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        UserRole::create([

            'user_id'=>$request->user_id,
            'role_id'=>$request->role_id,

        ]);

        return redirect()->route('user-role.index')->with('message','User wise role assigned successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editUserRole = UserRole::find($id);
        $users = User::all();
        $roles = Role::all();
        return view('backend.pages.user_role.edit_user_role', compact('editUserRole', 'users', 'roles'));
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
        $userRoleUpdate = UserRole::find($id);
        $userRoleUpdate->update([

            'user_id'=>$request->user_id,
            'role_id'=>$request->role_id,

        ]);

        return redirect()->route('user-role.index')->with('message', 'User wise role assigned update successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        UserRole::findOrFail($id)->delete();
        return redirect()->back()->with('delete', 'User wise role deleted successfully!');
    }
}
