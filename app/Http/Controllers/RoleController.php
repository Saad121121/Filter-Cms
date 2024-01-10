<?php

namespace App\Http\Controllers;

use App\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Role;

class RoleController extends Controller
{
    public function getIndex(){
	
       $roles =  Role::paginate(10);
       return view('role.index',compact('roles'));
    }

    public function create(){
        $permissions = Permission::all();
        return view('role.create',compact('permissions'));
    }

    public function save(Request $request){
        $this->validate($request,[
           'name' => 'required'
        ]);

        $role = Role::firstOrCreate(['name' => $request->name]);
        if($request->permissions != '' || $request->permissions != null){
            $role->permissions()->sync($request->permissions);
        }
        Session::flash('message','Role has been added');
        return back();
    }

    public function delete(Request $request){
        $role = Role::findOrfail($request->id);
        $role->delete();
        Session::flash('message','Role has been deleted');
        return back();
    }

    public function edit(Request $request){
        $permissions = Permission::all();
        $role = Role::findOrfail($request->id);
        $role_permissions = $role->permissions()->pluck('id')->toArray();
        return  view('role.edit',compact('role','permissions','role_permissions'));
    }

    public function update(Request $request){
        $this->validate($request,[
            'name' => 'required'
        ]);
        $role = Role::findOrfail($request->id);
        $role->name = $request->name;
        $role->save();
        if($request->permissions == null){
            $role->permissions()->detach();
        }else{
            $role->permissions()->sync($request->permissions);
        }

        Session::flash('message','Role has been updated');
        return redirect('role-management');
    }
}
