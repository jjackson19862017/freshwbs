<?php

namespace App\Http\Controllers;

use App\Models\Holidays;
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

    public function shardStaffHolidays(){
        $data = [];
        $data['staffs'] = Staff::where('hotel','=','shard')->orderBy('employmenttype','asc')->orderBy('surname','asc')->get(); // Returns all the information back from the Staff Table
        $data['positions'] = Position::all(); // Returns all the information back from the Staff Table
        foreach ($data['staffs'] as &$staff) {
            // Counts the holidays taken for each member of staff
            $staff->holidaysTaken = Holidays::where('staff_id','=',$staff->id)->pluck('daystaken')->sum();
        }
        $data['holidays'] = Holidays::orderBy('start','asc')->get();

        return view('admin.hotels.shard.holidays', $data);
    }









    public function themill(){
        $data = [];
        $data['staffs'] = Staff::where('hotel','=','The Mill')->orderBy('employmenttype','asc')->orderBy('surname','asc')->get(); // Returns all the information back from the Staff Table
        $data['positions'] = Position::all(); // Returns all the information back from the Staff Table
        return view('admin.hotels.themill.index', $data);
    }

   public function themillStaffHolidays(){
        $data = [];
        $data['staffs'] = Staff::where('hotel','=','The Mill')->orderBy('employmenttype','asc')->orderBy('surname','asc')->get(); // Returns all the information back from the Staff Table
        $data['positions'] = Position::all(); // Returns all the information back from the Staff Table
        foreach ($data['staffs'] as &$staff) {
            // Counts the holidays taken for each member of staff
            $staff->holidaysTaken = Holidays::where('staff_id','=',$staff->id)->pluck('daystaken')->sum();
        }
        $data['holidays'] = Holidays::orderBy('start','asc')->get();

        return view('admin.hotels.themill.holidays', $data);
    }
}
