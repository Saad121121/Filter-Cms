<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Permission;

class PermissionController extends Controller
{
    public function getIndex(){
        $permissions =  Permission::paginate(10);
        return view('permission.index',compact('permissions'));
    }

    public function create(){
        $permissions = Permission::all();
        return view('permission.create',compact('permissions'));
    }

    public function save(Request $request){
        $this->validate($request,[
            'name' => 'required'
        ]);
        Permission::firstOrCreate(['name' => $request->name]);
        Session::flash('message','Permission has been added');
        return back();
    }

    public function edit(Request $request){
       $permission = Permission::findOrfail($request->id);
        return  view('permission.edit',compact('permission'));
    }

    public function update(Request $request){
        $this->validate($request,[
            'name' => 'required'
        ]);
        $permission = Permission::findOrfail($request->id);
        $permission->name = $request->name;
        $permission->save();
        Session::flash('message','Permission has been updated');
        return redirect('permission-management');
    }

    public function delete(Request $request){
        $permission = Permission::findOrfail($request->id);
        $permission->delete();
        Session::flash('message','Permission has been deleted');
        return back();
    }
}
