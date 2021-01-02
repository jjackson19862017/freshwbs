<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Staff;
use App\Models\User;
use App\Models\WedEvents;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminsController extends Controller
{
    // This returns the Main Dashboard of the Admin Area
    public function index(){
        $customers = Customer::all(); // Returns all the information back from the customer Table
        $wedevents = WedEvents::all(); // Returns all the information back from the wedevent Table
        $users = User::all(); // Returns all the information back from the Users Table
        $staff = Staff::all(); // Returns all the information back from the Staff Table
        $booked = Wedevents::has('customer')->get(); // Asks the Wedevents Table to see if customers have booked an event
        $count_customer = count($customers); // Counts all Customers in the table.
        $count_wedevent = count($wedevents); // Counts all Events in the table.
        $count_user = count($users); // Counts all Users in the table.
        $count_staff = count($staff); // Counts all Staff in the table.
        $event_complete = DB::table('wed_events')->where('completed', 'Yes')->count(); // Counts all Completed Events in the Events table.

        $unbooked = $count_customer - $count_wedevent;

        return view('admin.index',[
            'customers'=>$customers,
            'wedevents'=>$wedevents,
            'users'=>$users,
            'staff'=>$staff,
            'booked'=>$booked,
            'unbooked'=>$unbooked,
            'count_customer'=>$count_customer,
            'count_wedevent'=>$count_wedevent,
            'count_user'=>$count_user,
            'count_staff'=>$count_staff,
            'event_complete'=>$event_complete,
        ]);
    }
}
