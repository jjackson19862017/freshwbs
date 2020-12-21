<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
class UserController extends Controller
{
    //
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
}
