<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\WedEvents;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CustomerController extends Controller
{
    // Shows the All the customer Members
    public function index(){
        $data = [];
        $data['customers'] = Customer::all(); // Returns all the information back from the customer Table
        $data['wedevents'] = WedEvents::all(); // Returns all the information back from the wedevent Table
        foreach($data['customers'] as &$customer){
            $customer->booked=WedEvents::where('customer_id','=',$customer->id)->first();
        }

        return view('admin.customers.index', $data);
    }

    // Shows the Create New customers Page
    public function create(){
        return view('admin.customers.create');
    }

    // Creating a New customer Member
    public function store(Customer $customer, Request $request): \Illuminate\Http\RedirectResponse
    {
        // Validates all the inputs from the Customer Create Page
        $inputs = request()->validate([
            'brideforename' => ['required', 'string', 'max:255', 'alpha_dash'],
            'bridesurname' => ['required', 'string', 'max:255', 'alpha_dash'],
            'groomforename' => ['required', 'string', 'max:255', 'alpha_dash'],
            'groomsurname' => ['required', 'string', 'max:255', 'alpha_dash'],
            'telephone' => ['required', 'string', 'max:13'],
            'email' => ['string', 'email', 'max:255'],
            'address1' => ['string', 'max:255'],
            'address2' => ['string', 'max:255'],
            'townCity' => ['string', 'max:255'],
            'county' => ['string', 'max:255'],
            'postCode' => ['string', 'max:255'],
        ]);
        $customer->create($inputs);
        $request->session()->flash('message', 'Customer was Created... ');
        $request->session()->flash('text-class', 'text-success');
        return redirect()->route('customers.index');
    }

    // Shows the customers Profile
    public function edit(Customer $customer){
        return view('admin.customers.edit', ['customer'=>$customer]);
    }

    public function update(Customer $customer, Request $request): \Illuminate\Http\RedirectResponse
    {
        // Validates all the inputs from the Customer Edit Page
        $inputs = request()->validate([
            'brideforename' => ['required', 'string', 'max:255', 'alpha_dash'],
            'bridesurname' => ['required', 'string', 'max:255', 'alpha_dash'],
            'groomforename' => ['required', 'string', 'max:255', 'alpha_dash'],
            'groomsurname' => ['required', 'string', 'max:255', 'alpha_dash'],
            'telephone' => ['required', 'string', 'max:13'],
            'email' => ['string', 'email', 'max:255'],
            'address1' => ['string', 'max:255'],
            'address2' => ['string', 'max:255'],
            'townCity' => ['string', 'max:255'],
            'county' => ['string', 'max:255'],
            'postCode' => ['string', 'max:255'],

        ]);

        $customer->update($inputs);
        $request->session()->flash('message', 'Customer was Updated... ');
        $request->session()->flash('text-class', 'text-success');
        return redirect()->route('customers.index');
    }

    public function destroy(Request $request, customer $customer){
        // Delete Customer
        $customer->delete();
        $request->session()->flash('message', 'Customer was Deleted...');
        $request->session()->flash('text-class', 'text-danger');
        return back();
    }
}
