<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permission;
use Illuminate\Support\Str;

class PermissionController extends Controller
{
    //
    public function index()
    {
        $permissions = Permission::all();
        return view('admin.permissions.index', ['permissions'=>$permissions]);
    }

    public function store(Request $request)
    {
        request()->validate([
            'name'=> ['required']
        ]);

        Permission::create([
            'name'=> Str::ucfirst(request('name')),
            'slug'=> Str::of(Str::lower(request('name')))->slug('-')
        ]);

        $request->session()->flash('message', 'Permission was created...');

        return back();
    }

    public function edit(Permission $permission)
    {

        return view('admin.permissions.edit', [
            'permission'=>$permission,
            'permissions'=>Permission::all()
        ]);
    }

    public function update(Request $request, Permission $permission)
    {
        $permission->name = Str::ucfirst(request('name'));
        $permission->slug = Str::of(request('name'))->slug('-');

        if($permission->isDirty('name')){ // info If something has changed in the form.
            $request->session()->flash('text-class', 'text-success');
            $request->session()->flash('message', 'Permission: ' . $permission->name . ' was Updated...');
            $permission->save();
        } else {
            $request->session()->flash('message', 'Nothing to Update...');

        }
        return redirect()->route('permission.index');
    }


    public function destroy(Request $request, Permission $permission){
        $permission->delete();
        $request->session()->flash('text-class', 'text-danger');
        $request->session()->flash('message', 'Permission was Deleted...');
        return back();
    }
}
