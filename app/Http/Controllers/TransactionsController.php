<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Transactions;
use App\Models\WedEvents;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TransactionsController extends Controller
{
    //
    // Shows the Create New Transaction Page
    public function create($wedevent){
        $event = WedEvents::find($wedevent)->first();
        $quarter = $event->cost / 4;
        return view('admin.transactions.create', ['wedevent'=>$wedevent, 'event'=>$event, 'quarter'=>$quarter]);
    }

    // Creating a New wedevent Member
    public function store(WedEvents $wedevent, Transactions $transaction, Request $request): RedirectResponse
    {
        $wedevent = request ('wedevent_id');
        $inputs = request()->validate([
            'wedevent_id' => ['required','numeric','unique:wed_events,customer_id'],
            'name' => ['required','string', 'max:255'],
            'amount' => ['required','numeric'],
        ]);
        $inputs;

        $transaction->create($inputs);
        $request->session()->flash('message', 'Transaction was Created... ');
        $request->session()->flash('text-class', 'text-success');
        return redirect()->route('wedevent.profile.show', ['wedevent'=>$wedevent,'customers'=>Customer::all()]);

    }



    public function destroy(Request $request, Transactions $transaction){
        // Delete Event
        $transaction->delete();
        $request->session()->flash('message', 'Event was Deleted...');
        $request->session()->flash('text-class', 'text-danger');
        return back();
    }


}
