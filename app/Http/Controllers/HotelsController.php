<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\DailySales;
use App\Models\Holidays;
use App\Models\Transactions;
use App\Models\User;
use App\Models\WedEvents;
use Illuminate\Http\Request;
use App\Models\Staff;
use App\Models\Position;
use Illuminate\Support\Carbon;
class HotelsController extends Controller
{
    //
    public function shard(){
        $data = [];
        $data['staffs'] = Staff::where('hotel','=','shard')->orderBy('employmenttype','asc')->orderBy('surname','asc')->get(); // Returns all the information back from the Staff Table
        $data['positions'] = Position::all(); // Returns all the information back from the Staff Table
        return view('admin.hotels.shard.index', $data);
    }

    public function shardStaffHolidays(){
        $data = [];
        $data['staffs'] = Staff::where('hotel','=','shard')->orderBy('employmenttype','asc')->orderBy('surname','asc')->get(); // Returns all the information back from the Staff Table
        $data['positions'] = Position::all(); // Returns all the information back from the Staff Table
        foreach ($data['staffs'] as &$staff) {
            // Counts the holidays taken for each member of staff
            $staff->holidaysTaken = Holidays::where('staff_id','=',$staff->id)->where('start', '>=', Carbon::create(null,1,1,0,0,0))->where('finish', '<=', Carbon::create(null,12,31,23,59,59))->pluck('daystaken')->sum(); // Returns all the holidays for the current year
        }
        $data['holidays'] = Holidays::orderBy('start','asc')->where('start', '>=', Carbon::now())->where('finish', '<=', Carbon::create(null,12,31,23,59,59))->get();
        $data['pastHolidays'] = Holidays::orderBy('start','asc')->where('finish', '<', Carbon::now())->get();

        return view('admin.hotels.shard.holidays', $data);
    }







    public function themill(){
        $data = [];
        $data['staffs'] = Staff::where('hotel','=','The Mill')->orderBy('employmenttype','asc')->orderBy('surname','asc')->get(); // Returns all the information back from the Staff Table
        $data['positions'] = Position::all(); // Returns all the information back from the Staff Table
        return view('admin.hotels.themill.index', $data);
    }

   public function themillStaffHolidays(){
        $data = [];
        $data['staffs'] = Staff::where('hotel','=','The Mill')->orderBy('employmenttype','asc')->orderBy('surname','asc')->get(); // Returns all the information back from the Staff Table
        $data['positions'] = Position::all(); // Returns all the information back from the Staff Table
        foreach ($data['staffs'] as &$staff) {
            // Counts the holidays taken for each member of staff
        $staff->holidaysTaken = Holidays::where('staff_id','=',$staff->id)->where('start', '>=', Carbon::create(null,1,1,0,0,0))->where('finish', '<=', Carbon::create(null,12,31,23,59,59))->pluck('daystaken')->sum(); // Returns all the holidays for the current year
        }
        $data['holidays'] = Holidays::orderBy('start','asc')->where('start', '>=', Carbon::now())->where('finish', '<=', Carbon::create(null,12,31,23,59,59))->get();
        $data['pastHolidays'] = Holidays::orderBy('start','asc')->where('finish', '<', Carbon::now())->get();

        return view('admin.hotels.themill.holidays', $data);
    }

    public function eventDashboard(){

        $data = [];
        $data['customers'] = Customer::orderBy('created_at','asc')->get(); // Returns all the information back from the customer Table
        $data['wedevents'] = WedEvents::orderBy('weddingdate','asc')->get(); // Returns all the information back from the wedevent Table
        $data['users'] = User::all(); // Returns all the information back from the Users Table
        $data['staff'] = Staff::all(); // Returns all the information back from the Staff Table
        $data['booked'] = Wedevents::has('customer')->where('completed','=','No')->orderBy('weddingdate','asc')->get(); // Asks the Wedevents Table to see if customers have booked an event
        $data['event_active'] = WedEvents::where('completed', 'No')->count(); // Counts all Not Completed Events in the Events table.
        $data['event_complete'] = WedEvents::where('completed', 'Yes')->count(); // Counts all Completed Events in the Events table.
        $data['event_onhold'] = WedEvents::where('onhold', 'No')->count(); // Counts all Completed Events in the Events table.

        $data['unbooked'] = count($data['customers']) - count($data['wedevents']);

        $data['cost_total'] = WedEvents::sum('cost'); // Adds Up the Costs Column in Wed Events

        $data['paid'] = Transactions::all()->sum('amount'); // Calculates the amount that everyone has paid towards the events
        $data['outstanding'] = $data['cost_total'] - $data['paid']; // Calculates the amount still owed to the company.

        $data['pastOnHolds'] = WedEvents::where('onhold','=','No')->where('holdtilldate','<',now())->orderBy('weddingdate','asc')->get(); // Returns a Count of How many Overdue OnHolds there are
        $data['pastQuarterlyPayments'] = WedEvents::where('quarterpaymenttaken','=','No')->where('quarterpaymentdate','<',now())->orderBy('weddingdate','asc')->get(); // Returns a Count of How many Overdue 25% Payments there are
        $data['pastFinalTalks'] = WedEvents::where('hadfinaltalk','=','No')->where('finalweddingtalkdate','<',now())->orderBy('weddingdate','asc')->get(); // Returns a Count of How many Overdue Final Talks there are
        $data['checkDeposits'] = WedEvents::where('deposittaken','=','No')->orderBy('weddingdate','asc')->get(); // Returns a Count of How many Deposits are outstanding.
        $data['issues'] = count($data['pastOnHolds']) + count($data['pastQuarterlyPayments']) + count($data['pastFinalTalks']) + count($data['checkDeposits']);

        //dd($data['pastOnHolds']);
        // Return Customers that havent booked an event
        foreach($data['customers'] as &$customer){
            $customer->booked=WedEvents::where('customer_id','=',$customer->id)->first(); // Returns
        }

        // Return Booked Customers
        foreach($data['booked'] as &$booker){
            $booker=Customer::where('id','=',$booker->customer->id)->get();
        }







        return view('admin.index', $data);
    }
}
