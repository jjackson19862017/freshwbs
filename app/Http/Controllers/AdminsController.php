<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Staff;
use App\Models\Transactions;
use App\Models\User;
use App\Models\WedEvents;
use App\Models\Rota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Holidays;
use App\Models\PersonalLicense;
use App\Models\Position;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Validation\Rule;
use App\Libraries\General;



class AdminsController extends Controller
{

    // This returns the Shards Dashboard of the Admin Area
    public function index(){

    $data = [];

    // Dropdown Box Values for Staff Card
    $data['staffList'] = Staff::whereHotel('Shard')->orderBy('surname', 'asc')->orderBy('forename', 'asc')->get();

    // Holiday Table
    $data['holidays'] = Holidays::orderBy('start','asc')->where('start', '>=', Carbon::now())->where('finish', '<=', Carbon::create(null,12,31,23,59,59))->limit(5)->get();

    // Dropdown Box Values for Rota Card
    $data['weekCommencing'] = Rota::select('weekCommencing')->orderBy('weekCommencing','desc')->distinct()->limit(4)->get();

//dd($data['weekCommencing']);


        return view('admin.index', $data);
    }

    public function staffDashboard(Request $request){
        $staff = $request;
        $data = [];
        $data['days'] = [
            'Monday',
            'Tuesday',
            'Wednesday',
            'Thursday',
            'Friday',
            'Saturday',
            'Sunday'
            ];
        switch ($request->input('action')) {
            case 'view':
                $data['staff'] = Staff::find($staff)->first(); // Returns all the information back from the Staff Table
                $data['positions'] = Position::all(); // Returns all the information back from the Staff Table
                $data['holidays'] = Holidays::where('staff_id', '=', $staff->id)->where('start', '>=', Carbon::create(null,1,1,0,0,0))->where('finish', '<=', Carbon::create(null,12,31,23,59,59))->get(); // Returns all the holidays for the current year
                $data['daysTaken'] = Holidays::where('staff_id', '=', $staff->id)->where('start', '>=', Carbon::create(null,1,1,0,0,0))->where('finish', '<=', Carbon::create(null,12,31,23,59,59))->pluck('daystaken')->sum(); // Adds all the Days taken for the Year
                $data['daysLeft'] = Staff::find($staff)->pluck('holidaysleft')->first() - $data['daysTaken'];

                //dd($data['staff']);
                return view('admin.staffs.profile', $data);
                break;

            default:
                // Allows User to add any dates that Start on a Monday from beginning of this week for the next month.
            $datevar = Carbon::now()->subWeek(); // Gets current date and minus a week
            $data['availableDates'] = []; // Create empty Array

            while($datevar != Carbon::parse($datevar)->isDayOfWeek(Carbon::MONDAY)){
                $datevar = $datevar->subDay(); // While the date isnt a Monday subtract a day till it is Monday
            }
            $datevar = $datevar->addWeek(); // Adds a week to the date

            // Generates an array with 5 Mondays in it for the next month.
            for($i=0; $i <= 4; $i++){
                $data['availableDates'] = Arr::add($data['availableDates'],$i,$datevar->format('Y-m-d'));
                $datevar = $datevar->addWeek();
            }

            //if Mondays can only be allowed to be on the list if the staff_id doesnt have a date record.

        $data['staff'] = Staff::find($staff)->first();
        //dd($data['staff']);

            foreach ($data['days'] as $day) {
                # Populates Dropdown box with Enum Values from Database
                $data[$day . 'RoleOne'] = General::getEnumValues('rotas',$day . 'RoleOne') ;
                $data[$day . 'RoleTwo'] = General::getEnumValues('rotas',$day . 'RoleTwo') ;
            }
            return view('admin.hotels.createrota',$data);

                break;
        }
    }

    public function rotaDashboard(Request $request){
        $data = [];
        $data['days'] = [
            'Monday',
            'Tuesday',
            'Wednesday',
            'Thursday',
            'Friday',
            'Saturday',
            'Sunday'
            ];
            $data['thisweekdate'] = $request->weekCommencing; // Gets selected user date
            $data['thisWeeksRota'] = Rota::where('WeekCommencing','=',$data['thisweekdate'])->get();
            //dd($data['thisweekdate']);


            foreach ($data['days'] as $day) {
                $data[$day .'Hours'] = $data['thisWeeksRota']->sum($day .'HoursOne') + $data['thisWeeksRota']->sum($day .'HoursTwo');
                //echo $data[$day .'Hours'];
            }
            //dd($data['thisWeeksRota']);

            return view('admin.hotels.shard.rota',$data);
        }


}
