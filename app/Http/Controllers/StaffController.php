<?php

namespace App\Http\Controllers;

use App\Models\Holidays;
use App\Models\PersonalLicense;
use App\Models\Position;
use App\Models\Staff;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StaffController extends Controller
{
    // Shows the All the Staff Members
    public function index(){
        $data = [];
        $data['staffs'] = Staff::orderBy('hotel','asc')->orderBy('employmenttype','asc')->orderBy('surname','asc')->get(); // Returns all the information back from the Staff Table
        $data['positions'] = Position::all(); // Returns all the information back from the Staff Table
        return view('admin.staffs.index', $data);
    }

    public function show(Staff $staff){
        $data = [];
        $data['staff'] = Staff::find($staff)->first(); // Returns all the information back from the Staff Table
        $data['positions'] = Position::all(); // Returns all the information back from the Staff Table
        $data['holidays'] = Holidays::where('staff_id', '=', $staff->id)->where('start', '>=', Carbon::create(null,1,1,0,0,0))->where('finish', '<=', Carbon::create(null,12,31,23,59,59))->get(); // Returns all the holidays for the current year
        $data['daysTaken'] = Holidays::where('staff_id', '=', $staff->id)->where('start', '>=', Carbon::create(null,1,1,0,0,0))->where('finish', '<=', Carbon::create(null,12,31,23,59,59))->pluck('daystaken')->sum(); // Adds all the Days taken for the Year
        $data['daysLeft'] = Staff::find($staff)->pluck('holidaysleft')->first() - $data['daysTaken'];


        return view('admin.staffs.profile', $data);
    }



        public function create(Staff $staff){
        $data = [];
        $data['staff'] = Staff::find($staff)->first(); // Returns all the information back from the Staff Table
        return view('admin.staffs.createHoliday', $data);
    }

    public function storeHoliday(Staff $staff, Request $request){


        $validator = Validator::make($request->all(), [
            'staff_id' => 'required|numeric',
            'start' => 'required|date|after_or_equal:today',
            'finish' => 'required|date|after:start',

        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }


        $holiday = [
            'staff_id' => $request->input('staff_id'),
            'start'=> $request->input('start'),
            'finish'=> $request->input('finish'),
            'daystaken'=>  Carbon::parse($request->start)->diff(Carbon::parse($request->finish))->days,
        ];

        $oriHolidaysLeft = $staff->holidaysleft;

        //dd($oriHolidaysLeft);

        $newId= Holidays::create($holiday)->id; // Stores the New Records Id in $newId
        $taken = Holidays::find($newId)->pluck('daystaken')->last();
        //dd($taken);
        $staff->holidaysleft = $oriHolidaysLeft - $taken;
//dd($staff);
        $staff->save();
        $request->session()->flash('message', 'Holiday was Created... ');
        $request->session()->flash('text-class', 'text-success');

        //dd($newId);

        return redirect()->route('staffs.profile', $staff);
    }


    // Creating a New Staff Member
    public function store(Staff $staff, Request $request): \Illuminate\Http\RedirectResponse
    {
        $inputs = request()->validate([
            'forename' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'telephone' => ['required', 'string', 'max:13'],
            'email' => ['string', 'email', 'max:255'],
            'address1' => ['string', 'max:255'],
            'address2' => ['string', 'max:255'],
            'townCity' => ['string', 'max:255'],
            'county' => ['string', 'max:255'],
            'postCode' => ['string', 'max:255'],
            'personallicense' => ['string', 'max:3'],
            'employmenttype' => ['string'],
            'position' => ['string', 'max:255'],
            'hotel' => ['string', 'max:255'],
            'status' => ['string', 'max:255'],
            'holidaysleft' => ['numeric'],

        ]);
        $staff->create($inputs);

        $request->session()->flash('message', 'Staff was Created... ');
        $request->session()->flash('text-class', 'text-success');
        return redirect()->route('staffs.index');
    }



    public function update(Staff $staff, Request $request): \Illuminate\Http\RedirectResponse
    {
        $inputs = request()->validate([
            'forename' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'telephone' => ['required', 'string', 'max:13'],
            'email' => ['string', 'email', 'max:255'],
            'address1' => ['string', 'max:255'],
            'address2' => ['string', 'max:255'],
            'townCity' => ['string', 'max:255'],
            'county' => ['string', 'max:255'],
            'postCode' => ['string', 'max:255'],
            'personallicense' => ['string', 'max:3'],
            'employmenttype' => ['string'],
            'position' => ['string', 'max:255'],
            'hotel' => ['string', 'max:255'],
            'status' => ['string', 'max:255'],
            'holidaysleft' => ['numeric'],

        ]);
        $staff->update($inputs);
        $request->session()->flash('message', 'Staff was Updated... ');
        $request->session()->flash('text-class', 'text-success');
        return redirect()->route('staffs.profile', $staff);
    }

    public function destroy(Request $request, Staff $staff): \Illuminate\Http\RedirectResponse
    {
        // Delete Staff
        $staff->delete();
        $request->session()->flash('message', 'Staff Member was Deleted...');
        $request->session()->flash('text-class', 'text-danger');
        return redirect()->route('staffs.index');

    }

    public function attach(Staff $staff): \Illuminate\Http\RedirectResponse
    {
        # Attach a role to a staff member
        $staff->positions()->attach(request ('position'));
        return back();
    }

    public function detach(Staff $staff): \Illuminate\Http\RedirectResponse
    {
        # Detach a role to a Staff Member
        $staff->positions()->detach(request ('position'));
        return back();
    }
    public function updatePL(Request $request, Staff $staff)
    {
        // When clicking on the button, it updates from yes to no and no to yes
        $staff = Staff::find($staff)->first();

        // info Times is used because thats that it gets modified into when it comes out of the database instead of No.
        ($staff->personallicense == "times" ? $staff->personallicense = "Yes" : $staff->personallicense = "No"); // Tenary If Statement
        $staff->save();
        return back();
    }
}
