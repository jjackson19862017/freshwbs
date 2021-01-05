<?php

namespace App\Http\Controllers;

use App\Models\Cards;
use App\Models\Customer;
use App\Models\Transactions;
use App\Models\WedEvents;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WedEventsController extends Controller
{
    // Shows the All the wedevent Members
    public function index()
    {
        $data = [];
        $we = WedEvents::all(); // Returns all the information back from the wedevent Table
        $data['wedevents'] = WedEvents::where('completed', '=', "No")->get(); // Finds all events that are not complete
        $data['count_wedevents'] = count($data['wedevents']);
        $event = WedEvents::where('completed', '=', "No")->get();

        foreach ($data['wedevents'] as &$wedevent) {
            $wedevent->out = Transactions::select('wedevent_id as $events', 'amount')->
                where('wedevent_id', '=', $wedevent->id)->sum('amount');

            $wedevent->out = $wedevent->cost - $wedevent->out;
        }

        return view('admin.wedevents.index', $data);
    }

    public function completed()
    {
        $data = [];
        //$wedevents = WedEvents::all(); // Returns all the information back from the wedevent Table
        $data['wedevents'] = WedEvents::where('completed', '=', "Yes")->get(); // Finds all events that are complete
        $data['count_wedevents'] = count($data['wedevents']);
        return view('admin.wedevents.completed', $data);
    }

    // Shows the Create New wedevents Page
    public function create(Customer $customer)
    {

        return view('admin.wedevents.create', ['customer' => $customer]);
    }

    // Creating a New wedevent Member
    public function store(Customer $customer, WedEvents $wedevents, Request $request): RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'customer_id' => 'required|numeric',
            'contractissueddate' => 'date',
            'weddingdate' => 'date',
            'onhold' => 'string|max:3',
            'contractreturned' => 'string|max:3',
            'agreementsigned' => 'string|max:3',
            'deposittaken' => 'string|max:3',
            'quarterpaymenttaken' => 'string|max:3',
            'hadfinaltalk' => 'string|max:3',
            'cost' => 'numeric',
        ]);

        if ($validator->fails()) {
            return redirect('post/create')
                ->withErrors($validator)
                ->withInput();
        }

        //dd($validator);
        $wedevents = [
            'customer_id' => $request->input('customer_id'),
            'contractissueddate'=> $request->input('contractissueddate'),
            'holdtilldate'=> Carbon::parse($request->contractissueddate)->addDays(14),
            'weddingdate'=> $request->input('weddingdate'),
            'quarterpaymentdate'=> Carbon::parse($request->weddingdate)->subDays(90),
            'finalweddingtalkdate'=> Carbon::parse($request->weddingdate)->subDays(42),
            'finalpaymentdate'=> Carbon::parse($request->weddingdate)->subDays(30),
            'onhold'=> $request->input('onhold'),
            'agreementsigned'=> $request->input('agreementsigned'),
            'deposittaken'=> $request->input('deposittaken'),
            'quarterpaymenttaken'=> $request->input('quarterpaymenttaken'),
            'hadfinaltalk'=> $request->input('hadfinaltalk'),
            'cost'=> $request->input('cost'),
        ];

        //dd($wedevents);
        $newId= WedEvents::create($wedevents)->id; // Stores the New Records Id in $newId
        $request->session()->flash('message', 'Event was Created... ');
        $request->session()->flash('text-class', 'text-success');

        //dd($newId);

        return redirect()->route('wedevent.profile.show', ['wedevent' => $newId, 'customers' => Customer::find($request->input('customer_id'))]);
    }

    // Shows the wedevents Edit Page
    public function edit(WedEvents $wedevent)
    {

        return view('admin.wedevents.edit', ['wedevent' => $wedevent, 'customers' => Customer::all()]);
    }

    // Shows the Users Profile
    public function show(WedEvents $wedevent)
    {
        $event = WedEvents::find($wedevent)->first();
        $hasCardDetails = Cards::where('customer_id', '=', $wedevent->customer_id)->first();
        $trans = Transactions::where('wedevent_id', '=', $wedevent->id)->get();
        $subtotal = Transactions::where('wedevent_id', '=', $wedevent->id)->get()->sum('amount');
        $outstanding = $event->cost - $subtotal;
        return view('admin.wedevents.profile', ['wedevent' => $wedevent, 'customers' => Customer::find($wedevent->customer->id)->first(), 'card' => $hasCardDetails, 'trans' => $trans, 'subtotal' => $subtotal, 'outstanding' => $outstanding]);
    }

    public function update(WedEvents $wedevent, Request $request): RedirectResponse
    {
        $inputs = request()->validate([
            'customer_id' => ['required', 'numeric'],
            'holdtilldate' => ['date', 'after:tomorrow'],
            'contractissueddate' => ['date', 'after:tomorrow'],
            'weddingdate' => ['date', 'after:tomorrow'],
            'deposittakendate' => ['date', 'after:tomorrow'],
            'quarterpaymentdate' => ['date', 'after:tomorrow'],
            'finalweddingtalkdate' => ['date', 'after:tomorrow'],
            'finalpaymentdate' => ['date', 'after:tomorrow'],
            'onhold' => ['string', 'max:3'],
            'agreementsigned' => ['string', 'max:3'],
            'deposittaken' => ['string', 'max:3'],
            'quarterpaymenttaken' => ['string', 'max:3'],
            'hadfinaltalk' => ['string', 'max:3'],
            'cost' => ['numeric'],
            'completed' => ['string', 'max:3'],

        ]);
        $wedevent->update($inputs);
        $request->session()->flash('message', 'Event was Updated... ');
        $request->session()->flash('text-class', 'text-success');
        return redirect()->route('wedevent.profile.show', ['wedevent' => $wedevent, 'customers' => Customer::all()]);
    }

    public function destroy(Request $request, WedEvents $wedevent)
    {
        // Delete Event
        $wedevent->delete();
        $request->session()->flash('message', 'Event was Deleted...');
        $request->session()->flash('text-class', 'text-danger');
        return redirect()->route('wedevents.index');
    }

    public function updateOnHold(Request $request, WedEvents $wedevent)
    {
        // When clicking on the button, it updates from yes to no and no to yes
        $wedevent = WedEvents::find($wedevent)->first();
        if ($wedevent->onhold == "No") {
            $wedevent->onhold = "Yes";
        } else {
            $wedevent->onhold = "No";
        }
        $wedevent->save();
        return back();
    }

    public function updateContractReturned(Request $request, WedEvents $wedevent)
    {
        // When clicking on the button, it updates from yes to no and no to yes
        $wedevent = WedEvents::find($wedevent)->first();
        if ($wedevent->contractreturned == "No") {
            $wedevent->contractreturned = "Yes";
        } else {
            $wedevent->contractreturned = "No";
        }
        $wedevent->save();
        return back();
    }

    public function updateAgreementSigned(Request $request, WedEvents $wedevent)
    {
        // When clicking on the button, it updates from yes to no and no to yes
        $wedevent = WedEvents::find($wedevent)->first();
        if ($wedevent->agreementsigned == "No") {
            $wedevent->agreementsigned = "Yes";
        } else {
            $wedevent->agreementsigned = "No";
        }
        $wedevent->save();
        return back();
    }

    public function updateDepositTaken(Request $request, WedEvents $wedevent)
    {
        // When clicking on the button, it updates from yes to no and no to yes
        $wedevent = WedEvents::find($wedevent)->first();
        if ($wedevent->deposittaken == "No") {
            $wedevent->deposittaken = "Yes";
        } else {
            $wedevent->deposittaken = "No";
        }
        $wedevent->save();
        return back();
    }

    public function updateQuarterPaymentTaken(Request $request, WedEvents $wedevent)
    {
        // When clicking on the button, it updates from yes to no and no to yes
        $wedevent = WedEvents::find($wedevent)->first();
        if ($wedevent->quarterpaymenttaken == "No") {
            $wedevent->quarterpaymenttaken = "Yes";
        } else {
            $wedevent->quarterpaymenttaken = "No";
        }
        $wedevent->save();
        return back();
    }

    public function updateHadFinalTalk(Request $request, WedEvents $wedevent)
    {
        // When clicking on the button, it updates from yes to no and no to yes
        $wedevent = WedEvents::find($wedevent)->first();
        if ($wedevent->hadfinaltalk == "No") {
            $wedevent->hadfinaltalk = "Yes";
        } else {
            $wedevent->hadfinaltalk = "No";
        }
        $wedevent->save();
        return back();
    }

    public function updateComplete(Request $request, WedEvents $wedevent)
    {
        // When clicking on the button, it updates from yes to no and no to yes
        $wedevent = WedEvents::find($wedevent)->first();
        if ($wedevent->completed == "No") {
            $wedevent->completed = "Yes";
        } else {
            $wedevent->completed = "No";
        }
        $wedevent->save();
        return back();
    }



    public function updateNotes(WedEvents $wedevent, Request $request): RedirectResponse
    {
        $inputs = request()->validate([
            'notes' => ['required','string'],
        ]);
        $wedevent->update($inputs);
        $request->session()->flash('message', 'Event was Updated... ');
        $request->session()->flash('text-class', 'text-success');
        return back();
    }
}
