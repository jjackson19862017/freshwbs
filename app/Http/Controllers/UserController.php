<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
class UserController extends Controller
{
    // Shows the All the Users
    public function index(){
        $users = User::all();
        return view('admin.users.index', ['users'=>$users]);
    }

    // Shows the Users Profile
    public function show(User $user){
        return view('admin.users.profile', ['user'=>$user]);
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
        $this->authorize('delete', $user); // info Only Allows users to edit their own posts.
        $request->session()->flash('message', 'User was Deleted...');
        return back();
    }
}
