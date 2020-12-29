<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\WedEvents;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class WedEventsController extends Controller
{
    // Shows the All the wedevent Members
    public function index(){
        $wedevents = WedEvents::all(); // Returns all the information back from the wedevent Table
        return view('admin.wedevents.index', ['wedevents'=>$wedevents, 'customer'=>Customer::all()]);
    }

    // Shows the Create New wedevents Page
    public function create(){

        return view('admin.wedevents.create', ['customers'=>Customer::all()]);
    }

    // Creating a New wedevent Member
    public function store(Customer $customer, WedEvents $wedevents, Request $request): RedirectResponse
    {
        $inputs = request()->validate([
            'customer_id' => ['required','numeric','unique:wed_events,customer_id'],
            'firstappointmentdate' => ['date', 'after:tomorrow'],
            'holdtilldate' => ['date','after:tomorrow'],
            'contractissueddate' => ['date','after:tomorrow'],
            'weddingdate' => ['date','after:tomorrow'],
            'deposittakendate' => ['date','after:tomorrow'],
            '25paymentdate' => ['date','after:tomorrow'],
            'finalweddingtalkdate' => ['date','after:tomorrow'],
            'finalpaymentdate' => ['date','after:tomorrow'],
            'onhold' => ['string', 'max:3'],
            'contractreturned' => ['string', 'max:3'],
            'agreementsigned' => ['string', 'max:3'],
            'deposittaken' => ['string', 'max:3'],
            '25paymenttaken' => ['string', 'max:3'],
            'hadfinaltalk' => ['string', 'max:3'],
            'cost' => ['numeric'],
            'subtotal' => ['numeric'],
        ]);
        //dd($inputs);

        $wedevents->create($inputs);
        $request->session()->flash('message', 'Event was Created... ');
        $request->session()->flash('text-class', 'text-success');
        return redirect()->route('wedevents.index');
    }

    // Shows the wedevents Profile
    public function edit(wedevent $wedevent){
        return view('admin.wedevents.edit', ['wedevent'=>$wedevent]);
    }

    public function update(wedevent $wedevent, Request $request): RedirectResponse
    {
        $inputs = request()->validate([
            'customer_id' => ['required','numeric'],
            'firstappointmentdate' => ['date', 'after:tomorrow'],
            'holdtilldate' => ['date','after:tomorrow'],
            'contractissueddate' => ['date','after:tomorrow'],
            'weddingdate' => ['date','after:tomorrow'],
            'deposittakendate' => ['date','after:tomorrow'],
            '25paymentdate' => ['date','after:tomorrow'],
            'finalweddingtalkdate' => ['date','after:tomorrow'],
            'finalpaymentdate' => ['date','after:tomorrow'],
            'onhold' => ['string', 'max:3'],
            'contractreturned' => ['string', 'max:3'],
            'agreementsigned' => ['string', 'max:3'],
            'deposittaken' => ['string', 'max:3'],
            '25paymenttaken' => ['string', 'max:3'],
            'hadfinaltalk' => ['string', 'max:3'],
            'cost' => ['numeric'],
            'subtotal' => ['numeric'],
        ]);

        $wedevent->update($inputs);
        $request->session()->flash('message', 'Event was Updated... ');
        $request->session()->flash('text-class', 'text-success');
        return redirect()->route('wedevents.index');
    }

    public function destroy(Request $request, WedEvents $wedevent){
        $wedevent->delete();
        $request->session()->flash('message', 'Event was Deleted...');
        $request->session()->flash('text-class', 'text-danger');
        return back();
    }
}
