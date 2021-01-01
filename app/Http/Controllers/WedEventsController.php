<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\WedEvents;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
            'quarterpaymentdate' => ['date','after:tomorrow'],
            'finalweddingtalkdate' => ['date','after:tomorrow'],
            'finalpaymentdate' => ['date','after:tomorrow'],
            'onhold' => ['string', 'max:3'],
            'contractreturned' => ['string', 'max:3'],
            'agreementsigned' => ['string', 'max:3'],
            'deposittaken' => ['string', 'max:3'],
            'quarterpaymenttaken' => ['string', 'max:3'],
            'hadfinaltalk' => ['string', 'max:3'],
            'cost' => ['numeric'],
            'subtotal' => ['numeric'],
            'completed' => ['string', 'max:3'],

        ]);
        //dd($inputs);

        $wedevents->create($inputs);
        $request->session()->flash('message', 'Event was Created... ');
        $request->session()->flash('text-class', 'text-success');
        return redirect()->route('wedevents.index');
    }

    // Shows the wedevents Edit Page
    public function edit(WedEvents $wedevent){

        return view('admin.wedevents.edit', ['wedevent'=>$wedevent,'customers'=>Customer::all()]);
    }

    // Shows the Users Profile
    public function show(WedEvents $wedevent){
        return view('admin.wedevents.profile', ['wedevent'=>$wedevent,'customers'=>Customer::all()]);
    }

    public function update(WedEvents $wedevent, Request $request): RedirectResponse
    {
        $inputs = request()->validate([
            'customer_id' => ['required','numeric'],
            'firstappointmentdate' => ['date', 'after:tomorrow'],
            'holdtilldate' => ['date','after:tomorrow'],
            'contractissueddate' => ['date','after:tomorrow'],
            'weddingdate' => ['date','after:tomorrow'],
            'deposittakendate' => ['date','after:tomorrow'],
            'quarterpaymentdate' => ['date','after:tomorrow'],
            'finalweddingtalkdate' => ['date','after:tomorrow'],
            'finalpaymentdate' => ['date','after:tomorrow'],
            'onhold' => ['string', 'max:3'],
            'contractreturned' => ['string', 'max:3'],
            'agreementsigned' => ['string', 'max:3'],
            'deposittaken' => ['string', 'max:3'],
            'quarterpaymenttaken' => ['string', 'max:3'],
            'hadfinaltalk' => ['string', 'max:3'],
            'cost' => ['numeric'],
            'subtotal' => ['numeric'],
            'completed' => ['string', 'max:3'],

        ]);
        $wedevent->update($inputs);
        $request->session()->flash('message', 'Event was Updated... ');
        $request->session()->flash('text-class', 'text-success');
        return redirect()->route('wedevent.profile.show', ['wedevent'=>$wedevent,'customers'=>Customer::all()]);
    }

    public function destroy(Request $request, WedEvents $wedevent){
        $wedevent->delete();
        $request->session()->flash('message', 'Event was Deleted...');
        $request->session()->flash('text-class', 'text-danger');
        return back();
    }

    public function updateOnHold(Request $request, WedEvents $wedevent){
        $wedevent = WedEvents::find($wedevent)->first();
        if($wedevent->onhold == "No"){
            $wedevent->onhold = "Yes";
        } else {
            $wedevent->onhold = "No";
        }
        $wedevent->save();
        return back();
    }

    public function updateContractReturned(Request $request, WedEvents $wedevent){
        $wedevent = WedEvents::find($wedevent)->first();
        if($wedevent->contractreturned == "No"){
            $wedevent->contractreturned = "Yes";
        } else {
            $wedevent->contractreturned = "No";
        }
        $wedevent->save();
        return back();
    }

    public function updateAgreementSigned(Request $request, WedEvents $wedevent){
        $wedevent = WedEvents::find($wedevent)->first();
        if($wedevent->agreementsigned == "No"){
            $wedevent->agreementsigned = "Yes";
        } else {
            $wedevent->agreementsigned = "No";
        }
        $wedevent->save();
        return back();
    }

    public function updateDepositTaken(Request $request, WedEvents $wedevent){
        $wedevent = WedEvents::find($wedevent)->first();
        if($wedevent->deposittaken == "No"){
            $wedevent->deposittaken = "Yes";
        } else {
            $wedevent->deposittaken = "No";
        }
        $wedevent->save();
        return back();
    }

    public function updateQuarterPaymentTaken(Request $request, WedEvents $wedevent){
        $wedevent = WedEvents::find($wedevent)->first();
        if($wedevent->quarterpaymenttaken == "No"){
            $wedevent->quarterpaymenttaken = "Yes";
        } else {
            $wedevent->quarterpaymenttaken = "No";
        }
        $wedevent->save();
        return back();
    }

    public function updateHadFinalTalk(Request $request, WedEvents $wedevent){
        $wedevent = WedEvents::find($wedevent)->first();
        if($wedevent->hadfinaltalk == "No"){
            $wedevent->hadfinaltalk = "Yes";
        } else {
            $wedevent->hadfinaltalk = "No";
        }
        $wedevent->save();
        return back();
    }

    public function updateComplete(Request $request, WedEvents $wedevent){
        $wedevent = WedEvents::find($wedevent)->first();
        if($wedevent->completed == "No"){
            $wedevent->completed = "Yes";
        } else {
            $wedevent->completed = "No";
        }
        $wedevent->save();
        return back();
    }
}
