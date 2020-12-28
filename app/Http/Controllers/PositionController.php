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
        $positions = position::all();
        return view('admin.positions.index', ['positions'=>$positions]);
    }

    public function store(Request $request)
    {
        request()->validate([
            'name'=> ['required']
        ]);

        position::create([
            'name'=> Str::ucfirst(request('name')),
        ]);

        $request->session()->flash('message', 'position was created...');

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
        $position->name = Str::ucfirst(request('name'));

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
        $position->delete();
        $request->session()->flash('message', 'position was Deleted...');
        return back();
    }
}
