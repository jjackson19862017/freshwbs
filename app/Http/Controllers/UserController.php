<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
class UserController extends Controller
{
    // Shows the All the Users
    public function index(){
        $data = [];
        if(auth()->user()->id == 1){
            $data['users'] = User::all(); // Returns all the information back from the Users Table
        } else {
                $data['users'] = User::where('id','!=',1)->get(); // Returns all the information back from the Users Table except the first User
                }
        $data['titles'] = Role::pluck('name'); // Returns all the Role names as titles
        $data['roles'] = Role::all();
        $data['c'] = []; // Blank Array for the counting.
            foreach ($data['titles'] as &$title){
                $data['c'][$title] = Role::whereName($title)->first()->users->count(); // Counts each Role and assigns it to the id in C
            }
        //dd($data['c']);
        return view('admin.users.index', $data);
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
        // Delete User
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
