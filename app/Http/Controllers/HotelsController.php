<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;
use App\Models\Position;

class HotelsController extends Controller
{
    //
    public function shard(){
        $data = [];
        $data['staffs'] = Staff::where('hotel','=','shard')->orderBy('employmenttype','asc')->orderBy('surname','asc')->get(); // Returns all the information back from the Staff Table
        $data['positions'] = Position::all(); // Returns all the information back from the Staff Table
        return view('admin.hotels.shard.index', $data);
    }

    public function themill(){
        $data = [];
        $data['staffs'] = Staff::where('hotel','=','The Mill')->orderBy('employmenttype','asc')->orderBy('surname','asc')->get(); // Returns all the information back from the Staff Table
        $data['positions'] = Position::all(); // Returns all the information back from the Staff Table
        return view('admin.hotels.themill.index', $data);
    }
}
