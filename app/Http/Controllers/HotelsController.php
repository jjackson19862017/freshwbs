<?php

namespace App\Http\Controllers;

use App\Models\Holidays;
use Illuminate\Http\Request;
use App\Models\Staff;
use App\Models\Position;
use Illuminate\Support\Carbon;
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
            $staff->holidaysTaken = Holidays::where('staff_id','=',$staff->id)->where('start', '>=', Carbon::create(null,1,1,0,0,0))->where('finish', '<=', Carbon::create(null,12,31,23,59,59))->pluck('daystaken')->sum(); // Returns all the holidays for the current year
        }
        $data['holidays'] = Holidays::orderBy('start','asc')->where('start', '>=', Carbon::now())->where('finish', '<=', Carbon::create(null,12,31,23,59,59))->get();
        $data['pastHolidays'] = Holidays::orderBy('start','asc')->where('finish', '<', Carbon::now())->get();

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
        $staff->holidaysTaken = Holidays::where('staff_id','=',$staff->id)->where('start', '>=', Carbon::create(null,1,1,0,0,0))->where('finish', '<=', Carbon::create(null,12,31,23,59,59))->pluck('daystaken')->sum(); // Returns all the holidays for the current year
        }
        $data['holidays'] = Holidays::orderBy('start','asc')->where('start', '>=', Carbon::now())->where('finish', '<=', Carbon::create(null,12,31,23,59,59))->get();
        $data['pastHolidays'] = Holidays::orderBy('start','asc')->where('finish', '<', Carbon::now())->get();

        return view('admin.hotels.themill.holidays', $data);
    }
}
