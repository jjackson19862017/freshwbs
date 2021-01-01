<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\WedEvents;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminsController extends Controller
{
    // This returns the Main Dashboard of the Admin Area
    public function index(){
        $customers = Customer::all(); // Returns all the information back from the customer Table
        $wedevents = WedEvents::all(); // Returns all the information back from the wedevent Table
        $booked = Wedevents::has('customer')->get();

        $count_customer = count($customers);
        $count_wedevent = count($wedevents);
        $event_complete = DB::table('wed_events')->where('completed', 'Yes')->count();
        return view('admin.index',[
            'customers'=>$customers,
            'wedevents'=>$wedevents,
            'booked'=>$booked,
            'count_customer'=>$count_customer,
            'count_wedevent'=>$count_wedevent,
            'event_complete'=>$event_complete,
        ]);
    }
}
