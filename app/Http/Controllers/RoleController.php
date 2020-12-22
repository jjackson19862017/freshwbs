<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use Illuminate\Support\Str;

class RoleController extends Controller
{
    //
    public function index()
    {
        $roles = Role::all();
        return view('admin.roles.index', ['roles'=>$roles]);
    }

    public function store(Request $request)
    {
        request()->validate([
            'name'=> ['required']
        ]);

        Role::create([
            'name'=> Str::ucfirst(request('name')),
            'slug'=> Str::of(Str::lower(request('name')))->slug('-')
        ]);

        $request->session()->flash('message', 'Role was created...');

        return back();
    }

    public function edit(Role $role)
    {
        return view('admin.roles.edit', ['role'=>$role]);
    }

    public function update(Request $request, Role $role)
    {
        $role->name = Str::ucfirst(request('name'));
        $role->slug = Str::of(request('name'))->slug('-');

        if($role->isDirty('name')){ // info If something has changed in the form.
            $request->session()->flash('message', 'Role: ' . $role->name . ' was Updated...');
            $role->save();
        } else {
            $request->session()->flash('message', 'Nothing to Update...');

        }



        return redirect()->route('role.index');
    }

    public function destroy(Request $request, Role $role){
        $role->delete();
        $request->session()->flash('message', 'Role was Deleted...');
        return back();
    }
}
