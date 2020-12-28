<?php

namespace App\Http\Controllers;

use App\Models\PersonalLicense;
use App\Models\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    // Shows the All the Staff Members
    public function index(){
        $staffs = Staff::all(); // Returns all the information back from the Staff Table

        $personalno = '<i class="fas fa-times"></i>';
        $personalyes = '<i class="fas fa-check-circle"></i>';

        return view('admin.staffs.index', ['staffs'=>$staffs, 'personalno'=>$personalno, 'personalyes'=>$personalyes]);
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
        return view('admin.staffs.edit', ['staff'=>$staff]);
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
            'position' => ['string', 'max:255'],
            'hotel' => ['string', 'max:255'],
            'status' => ['string', 'max:255'],
        ]);

        $staff->update($inputs);
        // Do they have a Personal License?
        $request->session()->flash('message', 'Staff was Updated... ');
        $request->session()->flash('text-class', 'text-success');
        return redirect()->route('staffs.index');
    }

    public function destroy(Request $request, Staff $staff): \Illuminate\Http\RedirectResponse
    {
        $staff->delete();
        $request->session()->flash('message', 'Staff Member was Deleted...');
        $request->session()->flash('text-class', 'text-danger');
        return back();
    }
}
