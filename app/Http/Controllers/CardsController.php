<?php

namespace App\Http\Controllers;

use App\Models\Cards;
use App\Models\Customer;
use App\Models\WedEvents;
use Illuminate\Http\Request;

class CardsController extends Controller
{
    //
    // Shows the Create New cards Page
    public function create(Customer $Card, WedEvents $Wed){
        $customer = Customer::find($Card)->first();
        $wedevent = WedEvents::find($Wed)->first();
        return view('admin.cards.create',['customer'=>$customer, 'wedevent'=>$wedevent]);
    }

    // Creating a New card Member
    public function store(WedEvents $wedevents, Cards $card, Request $request): \Illuminate\Http\RedirectResponse
    {
        $wedevent = request('id');
        $inputs = request()->validate([
            'customer_id' => ['required'],
            'name' => ['required', 'string', 'max:255'],
            'type' => ['required', 'string', 'max:40'],
            'number' => ['required', 'numeric','digits_between:15,16'],
            'exp' => ['required', 'date', 'after:today'],
            'cvc' => ['required', 'numeric', 'digits_between:3,4'],
        ]);
        $card->create($inputs);
        $request->session()->flash('message', 'Card was added... ');
        $request->session()->flash('text-class', 'text-success');
        return redirect()->route('wedevent.profile.show',$wedevent);

    }

    public function destroy(Request $request, cards $card): \Illuminate\Http\RedirectResponse
    {
        // Delete card
        $card->delete();
        $request->session()->flash('message', 'card Member was Deleted...');
        $request->session()->flash('text-class', 'text-danger');
        return back();
    }
}
