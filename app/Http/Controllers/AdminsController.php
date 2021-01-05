<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Staff;
use App\Models\Transactions;
use App\Models\User;
use App\Models\WedEvents;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminsController extends Controller
{
    // This returns the Main Dashboard of the Admin Area
    public function index(){
        $data = [];
        $data['customers'] = Customer::all(); // Returns all the information back from the customer Table
        $data['wedevents'] = WedEvents::all(); // Returns all the information back from the wedevent Table
        $data['users'] = User::all(); // Returns all the information back from the Users Table
        $data['staff'] = Staff::all(); // Returns all the information back from the Staff Table
        $data['booked'] = Wedevents::has('customer')->get(); // Asks the Wedevents Table to see if customers have booked an event
        $data['event_active'] = WedEvents::where('completed', 'No')->count(); // Counts all Completed Events in the Events table.
        $data['event_complete'] = WedEvents::where('completed', 'Yes')->count(); // Counts all Completed Events in the Events table.
        $data['event_onhold'] = WedEvents::where('onhold', 'No')->count(); // Counts all Completed Events in the Events table.

        $data['unbooked'] = count($data['customers']) - count($data['wedevents']);

        $data['cost_total'] = WedEvents::sum('cost'); // Adds Up the Costs Column in Wed Events

        $data['paid'] = Transactions::all()->sum('amount'); // Calculates the amount that everyone has paid towards the events
        $data['outstanding'] = $data['cost_total'] - $data['paid']; // Calculates the amount still owed to the company.

        $data['count_pastOnHolds'] = WedEvents::where('onhold','=','No')->where('holdtilldate','<',now())->count(); // Returns a Count of How many Overdue OnHolds there are
        $data['count_pastQuarterlyPayments'] = WedEvents::where('quarterpaymenttaken','=','No')->where('quarterpaymentdate','<',now())->count(); // Returns a Count of How many Overdue 25% Payments there are
        $data['count_pastFinalTalks'] = WedEvents::where('hadfinaltalk','=','No')->where('finalweddingtalkdate','<',now())->count(); // Returns a Count of How many Overdue Final Talks there are
        return view('admin.index', $data);
    }
}
