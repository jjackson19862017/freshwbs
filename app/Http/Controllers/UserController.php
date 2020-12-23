<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
class UserController extends Controller
{
    // Shows the All the Users
    public function index(){
        $users = User::all(); // Returns all the information back from the Users Table
        $admins = count(Role::whereName('Admin')->first()->users); // Counts all the admins in the roles/users Table
        $owners = count(Role::whereName('Owner')->first()->users); // Counts all the owners in the roles/users Table
        $managers = count(Role::whereName('Manager')->first()->users); // Counts all the managers in the roles/users Table
        $staffs = count(Role::whereName('Staff')->first()->users); // Counts all the staff in the roles/users Table
        $count = count($users); // Counts all the users Table
        return view('admin.users.index', ['users'=>$users, 'count'=>$count, 'roles'=>Role::all(), 'admins'=>$admins, 'owners'=>$owners, 'managers'=>$managers, 'staffs'=>$staffs]);
    }

    // Shows the Create New Users Page
    public function create(){
        return view('admin.users.create');
    }

    // Creating a New User
    public function store(Request $request){
        $inputs = request()->validate([
            'username' => ['required', 'string', 'max:255', 'unique:users', 'alpha_dash'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $createduser = User::create($inputs);
        $staff = Role::findOrFail(4); // Finds the role of staff.
        $createduser->roles()->attach($staff); // Gives all the new users the role of Staff
        $request->session()->flash('message', 'User was Created... ');
        $request->session()->flash('text-class', 'text-success');
        return redirect()->route('users.index');
    }

    // Shows the Users Profile
    public function show(User $user){
        return view('admin.users.profile', ['user'=>$user, 'roles'=>Role::all()]);
    }

    public function update(User $user, Role $role, Request $request): \Illuminate\Http\RedirectResponse
    {
        # Updating a Users Profile
        $inputs = request()->validate([

            'username' => ['required', 'string', 'max:255', 'alpha_dash'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            //'password'=>['min:8','max:255', 'confirmed'],
        ]);

        $user->update($inputs);
            $user->roles()->detach(); // Removes all roles attached to the user
            $user->roles()->attach(request('role')); // Attaches the selected role to the user
        $request->session()->flash('message', 'Profile Updated...');

        return back();
    }

    public function destroy(Request $request, User $user): \Illuminate\Http\RedirectResponse
    {
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
