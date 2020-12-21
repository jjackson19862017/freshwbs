<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
class UserController extends Controller
{
    // Shows the All the Users
    public function index(){
        $users = User::all();
        $count = count($users);
        return view('admin.users.index', ['users'=>$users, 'count'=>$count]);
    }

    // Shows the Create New Users Page
    public function create(){
        return view('admin.users.create');
    }

    // Shows the Create New Users Page
    public function store(Request $request){

        $inputs = request()->validate([
            'username' => ['required', 'string', 'max:255', 'unique:users', 'alpha_dash'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        User::create($inputs);
        $request->session()->flash('message', 'User was Created... ');
        $request->session()->flash('text-class', 'text-success');
        $users = User::all();
        return view('admin.users.index', ['users'=>$users]);
    }

    // Shows the Users Profile
    public function show(User $user){
        return view('admin.users.profile', ['user'=>$user, 'roles'=>Role::all()]);
    }

    public function update(User $user, Request $request): \Illuminate\Http\RedirectResponse
    {
        # Updating a Users Profile
        $inputs = request()->validate([

            'username'=> ['required', 'string', 'max:255', 'alpha_dash'],
            'name'=> ['required', 'string', 'max:255'],
            'email'=> ['required', 'email', 'max:255'],
            //'password'=>['min:5','max:255', 'confirmed'],
        ]);

        $request->session()->flash('message', 'Profile Updated...');
        $user->update($inputs);
        return back();
    }

    public function destroy(Request $request, User $user){
        $user->delete();
        $request->session()->flash('message', 'User was Deleted...');
        $request->session()->flash('text-class', 'text-danger');
        return back();
    }

    public function attach(User $user)
    {
        # Attach a role to a user
        $user->roles()->attach(request ('role'));
        return back();
    }

    public function detach(User $user)
    {
        # Detach a role to a user
        $user->roles()->detach(request ('role'));
        return back();
    }
}
