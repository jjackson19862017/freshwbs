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
        $booked = Wedevents::has('customer')->get();
        $count_customer = count($customers);
        $count_wedevent = count($wedevents);
        $count_user = count($users);
        $count_staff = count($staff);
        $event_complete = DB::table('wed_events')->where('completed', 'Yes')->count();

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
