<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;
use App\Models\Position;
use Illuminate\Support\Str;

class PositionController extends Controller
{
    //
    public function index()
    {
        $positions = position::all(); // Returns all the data from the Position Table
        return view('admin.positions.index', ['positions'=>$positions]);
    }

    public function store(Request $request)
    {
        request()->validate([
            'name'=> ['required']
        ]);

        // Takes the name input and creates the slug input all in lowercase and changes the spaces for -'s
        position::create([
            'name'=> Str::ucfirst(request('name')),
            'slug'=> Str::of(Str::lower(request('name')))->slug('-'),
            'icon'=> request('icon')
        ]);

        $request->session()->flash('message', 'Position was created...');

        return back();
    }

    public function edit(position $position)
    {
        return view('admin.positions.edit', [
            'position'=>$position,
            'staffs'=>Staff::all()
        ]);
    }

    public function update(Request $request, position $position)
    {
        // Takes the name input and creates the slug input all in lowercase and changes the spaces for -'s
        $position->name = Str::ucfirst(request('name'));
        $position->slug = Str::of(request('name'))->slug('-');
        $position->icon = request('icon');

        // If the name input has been changed then the name will be updated else do nothing.
        if($position->isDirty('name')){ // info If something has changed in the form.
            $request->session()->flash('message', 'position: ' . $position->name . ' was Updated...');
            $position->save();
        } else {
            $request->session()->flash('message', 'Nothing to Update...');

        }

        return redirect()->route('position.index');
    }

    public function staff_attach(position $position)
    {
        $position->staffs()->attach(request('staff'));
        return back();
    }

    public function staff_detach(position $position)
    {
        $position->staffs()->detach(request('staff'));
        return back();
    }

    public function destroy(Request $request, position $position){
        // Delete Position
        $position->delete();
        $request->session()->flash('message', 'position was Deleted...');
        return back();
    }
}
