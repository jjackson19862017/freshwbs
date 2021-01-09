<?php

namespace App\Http\Controllers;

use App\Models\PersonalLicense;
use App\Models\Position;
use App\Models\Staff;
use Illuminate\Http\Request;

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
        return view('admin.staffs.profile', $data);
    }



    // Shows the Create New Staffs Page
    public function create(){
        return view('admin.staffs.create');
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
        ]);
        $staff->create($inputs);

        $request->session()->flash('message', 'Staff was Created... ');
        $request->session()->flash('text-class', 'text-success');
        return redirect()->route('staffs.index');
    }

    // Shows the Staffs Profile
    public function edit(Staff $staff){
        return view('admin.staffs.edit', ['staff'=>$staff], ['positions'=>Position::all()]);
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
