<?php

namespace App\Http\Controllers;

use App\Models\DailySales;
use Illuminate\Http\Request;
use App\Models\Staff;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use PhpParser\Node\Stmt\Foreach_;

use function PHPUnit\Framework\isEmpty;

class DailySalesController extends Controller
{
    //
    public function endofdaysales(){
        $data = [];
        $data['staffs'] = Staff::all(); // Returns all the information back from the Staff Table

        return view('admin.hotels.createDailySales', $data);
    }

    public function allmoneysales(){
        $data = [];
        $data['sales'] = DailySales::where('hotel','=','Shard')->orderBy('date','desc')->paginate(15);
//dd($data['sales']);
        return view('admin.hotels.sales.allmoneysales', $data);
    }

    public function yearlysetup(){
        $currentYear = Carbon::createFromDate(null)->format('Y');
        $startDate = Carbon::createFromDate($currentYear,1,1);
        $endDate = Carbon::createFromDate($currentYear,12,31);
        while($startDate <= $endDate){
            $insert = DailySales::insert(['date'=>$startDate->format('Y-m-d'), 'user_id'=>0, 'hotel' =>'The Mill']);
            //array_push($arrayYear,$startDate->format('Y-m-d'));
            $startDate->addDay();
        }

        return redirect()->route('admin.hotels.sales.allmoneysales');
    }
    public function mondays(){

    $arrayMondays = [];
        $i = 1;
        $recordCount = DailySales::all()->count(); // Returns number of records in Table
        $n = 0;
        while($i <= $recordCount)
        {
            if(is_null($item = DailySales::find($n)))
            { // Checks to see if the record exists
                $n++; // if it doesnt add one and try again.
            } else {

                $item = DailySales::find($n)->where('id', '=', $n)->value('Date'); // Returns the date value.

                $n++;
                $isMonday = Carbon::parse($item)->isDayOfWeek(Carbon::MONDAY); // Checks the Date to see it equals Monday
                if($isMonday)
                {
                    array_push($arrayMondays, $item); // Add to array table
                };
            $i++;
            };
        };
        $RoomsSoldondaySelection = array_reverse($arrayMondays);
        return $RoomsSoldondaySelection;
    }


    public function edit(DailySales $sales){
        $data = [];
        $data['sales'] = DailySales::find($sales->id);
        //dd($data['sales']);
        return view('admin.hotels.sales.edit',$data);
    }

    public function update(DailySales $sales, Request $request){
        $data = [];
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|numeric',
            'date' => 'date',
            'iou' => 'numeric',
            'bacs' => 'numeric',
            'cheque' => 'numeric',
            'pdqreception' => 'numeric',
            'pdqbar' => 'numeric',
            'pdqrestaurant' => 'numeric',
            'notefifty' => 'numeric',
            'notetwenty' => 'numeric',
            'noteten' => 'numeric',
            'notefive' => 'numeric',
            'coinonepound' => 'numeric',
            'coinfifty' => 'numeric',
            'cointwenty' => 'numeric',
            'cointen' => 'numeric',
            'coinfive' => 'numeric',
            'cointwo' => 'numeric',
            'coinone' => 'numeric',
            'gpostotal' => 'required|numeric',
            'roomssold' => 'numeric',
            'roomsoccupied' => 'numeric|max:24',
            'residents' => 'numeric',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        //dd($validator);
        $tillcount = [
            'user_id' => $request->input('user_id'),
            'hotel' => $request->input('hotel'),
            'date' => $request->input('date'),
            'iou' => $request->input('iou'),
            'bacs' => $request->input('bacs'),
            'cheque' => $request->input('cheque'),
            'pdqreception' => $request->input('pdqreception'),
            'pdqbar' => $request->input('pdqbar'),
            'pdqrestaurant' => $request->input('pdqrestaurant'),
            'notefifty' => $request->input('notefifty'),
            'notetwenty' => $request->input('notetwenty'),
            'noteten' => $request->input('noteten'),
            'notefive' => $request->input('noteten'),
            'coinonepound' => $request->input('coinonepound'),
            'coinfifty' => $request->input('coinfifty'),
            'cointwenty' => $request->input('cointwenty'),
            'cointen' => $request->input('cointen'),
            'coinfive' => $request->input('coinfive'),
            'cointwo' => $request->input('cointwo'),
            'coinone' => $request->input('coinone'),
            'gpostotal' => $request->input('gpostotal'),
            'roomssold' => $request->input('roomssold'),
            'roomsoccupied' => $request->input('roomsoccupied'),
            'residents' => $request->input('residents'),

            // Card Total
            'cardtotal' => $request->pdqreception + $request->pdqbar + $request->pdqrestaurant,

            // Till Maths
            'totalnotefifty' => $request->notefifty * 50,
            'totalnotetwenty' => $request->notetwenty * 20,
            'totalnoteten' => $request->noteten * 10,
            'totalnotefive' => $request->notefive * 5,
            'totalcoinonepound' => $request->coinonepound * 1,
            'totalcoinfifty' => $request->coinfifty * .5,
            'totalcointwenty' => $request->cointwenty * .2,
            'totalcointen' => $request->cointen * .1,
            'totalcoinfive' => $request->coinfive * .05,
            'totalcointwo' => $request->cointwo * .02,
            'totalcoinone' => $request->coinone * .01,

            // Till Total
            'cashtotal' => ($request->notefifty * 50) + ($request->notetwenty * 20) + ($request->noteten * 10) + ($request->notefive * 5) + ($request->coinonepound * 1) + ($request->coinfifty * .5) + ($request->cointwenty * .2) + ($request->cointen * .1) + ($request->coinfive * .05) + ($request->cointwo * .02) + ($request->coinone * .01),

            // Every Total
            'total' => $request->pdqreception + $request->pdqbar + $request->pdqrestaurant + $request->bacs + $request->iou + $request->cheque + ($request->notefifty * 50) + ($request->notetwenty * 20) + ($request->noteten * 10) + ($request->notefive * 5) + ($request->coinonepound * 1) + ($request->coinfifty * .5) + ($request->cointwenty * .2) + ($request->cointen * .1) + ($request->coinfive * .05) + ($request->cointwo * .02) + ($request->coinone * .01),

            // Float
            'float' => $request->pdqreception + $request->pdqbar + $request->pdqrestaurant + $request->bacs + $request->iou + $request->cheque + ($request->notefifty * 50) + ($request->notetwenty * 20) + ($request->noteten * 10) + ($request->notefive * 5) + ($request->coinonepound * 1) + ($request->coinfifty * .5) + ($request->cointwenty * .2) + ($request->cointen * .1) + ($request->coinfive * .05) + ($request->cointwo * .02) + ($request->coinone * .01) - $request->gpostotal,

            // Cash for the safe
            'cashsafe' => $request->gpostotal - ($request->pdqreception + $request->pdqbar + $request->pdqrestaurant + $request->bacs)
        ];

        //dd($tillcount);

        $sales->update($tillcount);
        $request->session()->flash('message', 'Sales sheet updated... ');
        $request->session()->flash('text-class', 'text-success');
        return redirect()->route('admin.hotels.sales.allmoneysales');
    }

    public function store(Request $request){
     $validator = Validator::make($request->all(), [
            'user_id' => 'required|numeric',
            'date' => 'unique:daily_sales,date',
            'iou' => 'numeric',
            'bacs' => 'numeric',
            'cheque' => 'numeric',
            'pdqreception' => 'numeric',
            'pdqbar' => 'numeric',
            'pdqrestaurant' => 'numeric',
            'notefifty' => 'numeric',
            'notetwenty' => 'numeric',
            'noteten' => 'numeric',
            'notefive' => 'numeric',
            'coinonepound' => 'numeric',
            'coinfifty' => 'numeric',
            'cointwenty' => 'numeric',
            'cointen' => 'numeric',
            'coinfive' => 'numeric',
            'cointwo' => 'numeric',
            'coinone' => 'numeric',
            'gpostotal' => 'required|numeric',
            'roomssold' => 'numeric',
            'roomsoccupied' => 'numeric|max:24',
            'residents' => 'numeric',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        //dd($validator);
        $tillcount = [
            'user_id' => $request->input('user_id'),
            'hotel' => $request->input('hotel'),
            'date' => $request->input('date'),
            'iou' => $request->input('iou'),
            'bacs' => $request->input('bacs'),
            'cheque' => $request->input('cheque'),
            'pdqreception' => $request->input('pdqreception'),
            'pdqbar' => $request->input('pdqbar'),
            'pdqrestaurant' => $request->input('pdqrestaurant'),
            'notefifty' => $request->input('notefifty'),
            'notetwenty' => $request->input('notetwenty'),
            'noteten' => $request->input('noteten'),
            'notefive' => $request->input('noteten'),
            'coinonepound' => $request->input('coinonepound'),
            'coinfifty' => $request->input('coinfifty'),
            'cointwenty' => $request->input('cointwenty'),
            'cointen' => $request->input('cointen'),
            'coinfive' => $request->input('coinfive'),
            'cointwo' => $request->input('cointwo'),
            'coinone' => $request->input('coinone'),
            'gpostotal' => $request->input('gpostotal'),
            'roomssold' => $request->input('roomssold'),
            'roomsoccupied' => $request->input('roomsoccupied'),
            'residents' => $request->input('residents'),

            // Card Total
            'cardtotal' => $request->pdqreception + $request->pdqbar + $request->pdqrestaurant,

            // Till Maths
            'totalnotefifty' => $request->notefifty * 50,
            'totalnotetwenty' => $request->notetwenty * 20,
            'totalnoteten' => $request->noteten * 10,
            'totalnotefive' => $request->notefive * 5,
            'totalcoinonepound' => $request->coinonepound * 1,
            'totalcoinfifty' => $request->coinfifty * .5,
            'totalcointwenty' => $request->cointwenty * .2,
            'totalcointen' => $request->cointen * .1,
            'totalcoinfive' => $request->coinfive * .05,
            'totalcointwo' => $request->cointwo * .02,
            'totalcoinone' => $request->coinone * .01,

            // Till Total
            'cashtotal' => ($request->notefifty * 50) + ($request->notetwenty * 20) + ($request->noteten * 10) + ($request->notefive * 5) + ($request->coinonepound * 1) + ($request->coinfifty * .5) + ($request->cointwenty * .2) + ($request->cointen * .1) + ($request->coinfive * .05) + ($request->cointwo * .02) + ($request->coinone * .01),

            // Every Total
            'total' => $request->pdqreception + $request->pdqbar + $request->pdqrestaurant + $request->bacs + $request->iou + $request->cheque + ($request->notefifty * 50) + ($request->notetwenty * 20) + ($request->noteten * 10) + ($request->notefive * 5) + ($request->coinonepound * 1) + ($request->coinfifty * .5) + ($request->cointwenty * .2) + ($request->cointen * .1) + ($request->coinfive * .05) + ($request->cointwo * .02) + ($request->coinone * .01),

            // Float
            'float' => $request->pdqreception + $request->pdqbar + $request->pdqrestaurant + $request->bacs + $request->iou + $request->cheque + ($request->notefifty * 50) + ($request->notetwenty * 20) + ($request->noteten * 10) + ($request->notefive * 5) + ($request->coinonepound * 1) + ($request->coinfifty * .5) + ($request->cointwenty * .2) + ($request->cointen * .1) + ($request->coinfive * .05) + ($request->cointwo * .02) + ($request->coinone * .01) - $request->gpostotal,

            // Cash for the safe
            'cashsafe' => $request->gpostotal - ($request->pdqreception + $request->pdqbar + $request->pdqrestaurant + $request->bacs)
        ];

        //dd($tillcount);

        $newId= DailySales::create($tillcount)->id; // Stores the New Records Id in $newId
        $request->session()->flash('message', 'Event was Created... ');
        $request->session()->flash('text-class', 'text-success');

        //dd($newId);

        return redirect()->route('admin.index');
    }

    public function salessheet(){
        // Configure the Date Find Drop Box
        $testDate = Carbon::now();
        while($testDate != Carbon::parse($testDate)->isDayOfWeek(Carbon::MONDAY)){
            $testDate = $testDate->subDay();
            //echo $testDate;
        }
        $startOfWeek = $testDate;
        $testDate = $testDate->format('Y-m-d'); // returns Today

        $startOfWeek = $startOfWeek->subDay();
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

        $data['shardweeklysales'] = DailySales::orderBy('date','asc')->where('hotel','=','Shard')->where('date','>=',$startOfWeek)->limit(7)->get();
        $data['shardweeklycount'] = DailySales::orderBy('date','asc')->where('hotel','=','Shard')->where('date','>=',$startOfWeek)->limit(7)->get()->count();
        //dd($data['days']);
        $data['tablesize'] = [];

        // Only displays the days that exist for the week
        for ($r=0; $r < $data['shardweeklycount']; $r++) {
        array_push($data['tablesize'],$data['days'][$r]);
        }


        $data['shardweeklytotalbacs'] = DailySales::orderBy('date','asc')->where('hotel','=','Shard')->where('date','>=',$startOfWeek)->limit(7)->pluck('bacs')->sum();
        //$data['themillweeklysales'] = DailySales::orderBy('date','asc')->where('hotel','=','The Mill')->where('date','>=',$startOfWeek)->limit(7)->get();

        $data['shardweeklytotalcards'] = DailySales::orderBy('date','asc')->where('hotel','=','Shard')->where('date','>=',$startOfWeek)->limit(7)->pluck('cardtotal')->sum();

        $data['shardweeklytotalcash'] = DailySales::orderBy('date','asc')->where('hotel','=','Shard')->where('date','>=',$startOfWeek)->limit(7)->pluck('cashtotal')->sum();
        $data['shardweeklytotalgpos'] = DailySales::orderBy('date','asc')->where('hotel','=','Shard')->where('date','>=',$startOfWeek)->limit(7)->pluck('gpostotal')->sum();
        $data['shardweeklytotalsafe'] = DailySales::orderBy('date','asc')->where('hotel','=','Shard')->where('date','>=',$startOfWeek)->limit(7)->pluck('cashsafe')->sum();
        $data['shardweeklytotalrooms'] = DailySales::orderBy('date','asc')->where('hotel','=','Shard')->where('date','>=',$startOfWeek)->limit(7)->pluck('roomssold')->sum();

        $arrayMondays = [];
        $i = 1;
        $recordCount = DailySales::all()->count(); // Returns number of records in Table
        $n = 0;
        while($i <= $recordCount)
        {
            if(is_null($item = DailySales::find($n)))
            { // Checks to see if the record exists
                $n++; // if it doesnt add one and try again.
            } else {

                $item = DailySales::find($n)->where('hotel','=','Shard')->where('id', '=', $n)->value('Date'); // Returns the date value.

                $n++;
                $isMonday = Carbon::parse($item)->isDayOfWeek(Carbon::MONDAY); // Checks the Date to see it equals Monday
                if($isMonday)
                {
                    array_push($arrayMondays, $item); // Add to array table
                };
            $i++;
            };
        };
        //dd($arrayMondays);
        $data['mondaySelection'] = $arrayMondays;  // Orders it so the latest date is at the top of the list.

//dd($data['arrayMondays']);

        return view('admin.hotels.salessheet', $data);
    }

    public function salessheetfind(Request $request){
        // Configure the Date Find Drop Box

        $testDate = $request->input('mondayselector');
        $testDate = Carbon::parse($testDate);

        while($testDate != Carbon::parse($testDate)->isDayOfWeek(Carbon::MONDAY)){
            $testDate = $testDate->subDay();
            //echo $testDate;
        }
        $startOfWeek = $testDate;
        $testDate = $testDate->format('Y-m-d'); // returns Today

        //$startOfWeek = $startOfWeek->subDay();
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

        $data['shardweeklysales'] = DailySales::orderBy('date','asc')->where('hotel','=','Shard')->where('date','>=',$startOfWeek)->limit(7)->get();

        $data['shardweeklytotalbacs'] = DailySales::orderBy('date','asc')->where('hotel','=','Shard')->where('date','>=',$startOfWeek)->limit(7)->pluck('bacs')->sum();
        //$data['themillweeklysales'] = DailySales::orderBy('date','asc')->where('hotel','=','The Mill')->where('date','>=',$startOfWeek)->limit(7)->get();
        $data['shardweeklycount'] = DailySales::orderBy('date','asc')->where('hotel','=','Shard')->where('date','>=',$startOfWeek)->limit(7)->get()->count();
        //dd($data['shardweeklycount']);
        $data['tablesize'] = [];

        // Only displays the days that exist for the week
        for ($r=0; $r < $data['shardweeklycount']; $r++) {
        array_push($data['tablesize'],$data['days'][$r]);
        echo $data['tablesize'][$r];
        }


        $data['shardweeklytotalcards'] = DailySales::orderBy('date','asc')->where('hotel','=','Shard')->where('date','>=',$startOfWeek)->limit(7)->pluck('cardtotal')->sum();

        $data['shardweeklytotalcash'] = DailySales::orderBy('date','asc')->where('hotel','=','Shard')->where('date','>=',$startOfWeek)->limit(7)->pluck('cashtotal')->sum();
        $data['shardweeklytotalgpos'] = DailySales::orderBy('date','asc')->where('hotel','=','Shard')->where('date','>=',$startOfWeek)->limit(7)->pluck('gpostotal')->sum();
        $data['shardweeklytotalsafe'] = DailySales::orderBy('date','asc')->where('hotel','=','Shard')->where('date','>=',$startOfWeek)->limit(7)->pluck('cashsafe')->sum();
        $data['shardweeklytotalrooms'] = DailySales::orderBy('date','asc')->where('hotel','=','Shard')->where('date','>=',$startOfWeek)->limit(7)->pluck('roomssold')->sum();


        $arrayMondays = [];
        $i = 1;
        $recordCount = DailySales::all()->count(); // Returns number of records in Table
        $n = 0;
        while($i <= $recordCount)
        {
            if(is_null($item = DailySales::find($n)))
            { // Checks to see if the record exists
                $n++; // if it doesnt add one and try again.
            } else {

                $item = DailySales::find($n)->where('hotel','=','Shard')->where('id', '=', $n)->orderBy('date', 'desc')->value('Date'); // Returns the date value.

                $n++;
                $isMonday = Carbon::parse($item)->isDayOfWeek(Carbon::MONDAY); // Checks the Date to see it equals Monday
                if($isMonday)
                {
                    array_push($arrayMondays, $item); // Add to array table
                };
            $i++;
            };
        };
        $data['mondaySelection'] = $arrayMondays;  // Orders it so the latest date is at the top of the list.

        //dd($data['mondaySelection']);

        return view('admin.hotels.salessheet', $data);
    }

    public function occreportshard(){
        $data = [];
        $data['CurrentYearArray']= []; // Will be used to track number of days in that month
        $data['CurrentYearDaysArray']= []; // Will be used to calculate the number of days in that month
        $data['BackOneYearArray']= []; // Will be used to track number of days in that month
        $data['BackOneYearDaysArray']= [];// Will be used to calculate the number of days in that month
        $data['BackTwoYearArray']= []; // Will be used to track number of days in that month
        $data['BackTwoYearDaysArray']= [];// Will be used to calculate the number of days in that month
        $data['CurrentYearRoomsSold']= []; // Random Number array that will be replaced my data in the future.
        $data['BackOneYearRoomsSold']= []; // Random Number array that will be replaced my data in the future.
        $data['BackTwoYearRoomsSold']= []; // Random Number array that will be replaced my data in the future.
        $data['CurrentYearOcc']= []; // Random Number array that will be replaced my data in the future.
        $data['BackOneYearOcc']= []; // Random Number array that will be replaced my data in the future.
        $data['BackTwoYearOcc']= []; // Random Number array that will be replaced my data in the future.
        $rooms = 23; // Number of Rooms the Shard has


        // Formula for Occ Report
        // Occ Rate = (Rooms Sold / (days of the month x 23)) * 100
        $data['currentYear'] = Carbon::createFromDate(null)->format('Y');
        $data['backOneYear'] = $data['currentYear'] - 1;
        $data['backTwoYear'] = $data['currentYear'] - 2;

        // Works out Days in each Month for Current Year and going back two.
        $i = 1; // Counter
        while($i<=12){
            array_push($data['CurrentYearArray'], Carbon::createFromDate(null, $i)->daysInMonth); // Counts days in each month and puts it into an array
            array_push($data['BackOneYearArray'], Carbon::createFromDate($data['backOneYear'], $i)->daysInMonth); // Counts days in each month and puts it into an array
            array_push($data['BackTwoYearArray'], Carbon::createFromDate($data['backTwoYear'], $i)->daysInMonth); // Counts days in each month and puts it into an array
            $i++;
        }
        //dd($data['BackOneYearArray']);
        // Finds All Room Sales This Year for the Shard
        //dd($data['CurrentYearRoomsSold'] = DailySales::where('hotel','=','Shard')->whereYear('date','=',date('Y'))->pluck('roomsoccupied')) ;

        //Current Year Query Variables
        $currentJanStart = Carbon::create($data['currentYear'],1)->startOfMonth();
        $currentFebStart = Carbon::create($data['currentYear'],2)->startOfMonth();
        $currentMarStart = Carbon::create($data['currentYear'],3)->startOfMonth();
        $currentAprStart = Carbon::create($data['currentYear'],4)->startOfMonth();
        $currentMayStart = Carbon::create($data['currentYear'],5)->startOfMonth();
        $currentJunStart = Carbon::create($data['currentYear'],6)->startOfMonth();
        $currentJulStart = Carbon::create($data['currentYear'],7)->startOfMonth();
        $currentAugStart = Carbon::create($data['currentYear'],8)->startOfMonth();
        $currentSepStart = Carbon::create($data['currentYear'],9)->startOfMonth();
        $currentOctStart = Carbon::create($data['currentYear'],10)->startOfMonth();
        $currentNovStart = Carbon::create($data['currentYear'],11)->startOfMonth();
        $currentDecStart = Carbon::create($data['currentYear'],12)->startOfMonth();
        $currentJanEnd = Carbon::create($data['currentYear'],1)->endOfMonth();
        $currentFebEnd = Carbon::create($data['currentYear'],2)->endOfMonth();
        $currentMarEnd = Carbon::create($data['currentYear'],3)->endOfMonth();
        $currentAprEnd = Carbon::create($data['currentYear'],4)->endOfMonth();
        $currentMayEnd = Carbon::create($data['currentYear'],5)->endOfMonth();
        $currentJunEnd = Carbon::create($data['currentYear'],6)->endOfMonth();
        $currentJulEnd = Carbon::create($data['currentYear'],7)->endOfMonth();
        $currentAugEnd = Carbon::create($data['currentYear'],8)->endOfMonth();
        $currentSepEnd = Carbon::create($data['currentYear'],9)->endOfMonth();
        $currentOctEnd = Carbon::create($data['currentYear'],10)->endOfMonth();
        $currentNovEnd = Carbon::create($data['currentYear'],11)->endOfMonth();
        $currentDecEnd = Carbon::create($data['currentYear'],12)->endOfMonth();

        $data['CurrentYearArraySold'] = [
        $data['janThisYearRooms'] = DailySales::where('hotel','=','Shard')->where('date', '>=', $currentJanStart)->where('date', '<=',$currentJanEnd)->sum('roomsoccupied'),
        $data['febThisYearRooms'] = DailySales::where('hotel','=','Shard')->where('date', '>=', $currentFebStart)->where('date', '<=',$currentFebEnd)->sum('roomsoccupied'),
        $data['marThisYearRooms'] = DailySales::where('hotel','=','Shard')->where('date', '>=', $currentMarStart)->where('date', '<=',$currentMarEnd)->sum('roomsoccupied'),
        $data['aprThisYearRooms'] = DailySales::where('hotel','=','Shard')->where('date', '>=', $currentAprStart)->where('date', '<=',$currentAprEnd)->sum('roomsoccupied'),
        $data['mayThisYearRooms'] = DailySales::where('hotel','=','Shard')->where('date', '>=', $currentMayStart)->where('date', '<=',$currentMayEnd)->sum('roomsoccupied'),
        $data['junThisYearRooms'] = DailySales::where('hotel','=','Shard')->where('date', '>=', $currentJunStart)->where('date', '<=',$currentJunEnd)->sum('roomsoccupied'),
        $data['julThisYearRooms'] = DailySales::where('hotel','=','Shard')->where('date', '>=', $currentJulStart)->where('date', '<=',$currentJulEnd)->sum('roomsoccupied'),
        $data['augThisYearRooms'] = DailySales::where('hotel','=','Shard')->where('date', '>=', $currentAugStart)->where('date', '<=',$currentAugEnd)->sum('roomsoccupied'),
        $data['sepThisYearRooms'] = DailySales::where('hotel','=','Shard')->where('date', '>=', $currentSepStart)->where('date', '<=',$currentSepEnd)->sum('roomsoccupied'),
        $data['octThisYearRooms'] = DailySales::where('hotel','=','Shard')->where('date', '>=', $currentOctStart)->where('date', '<=',$currentOctEnd)->sum('roomsoccupied'),
        $data['novThisYearRooms'] = DailySales::where('hotel','=','Shard')->where('date', '>=', $currentNovStart)->where('date', '<=',$currentNovEnd)->sum('roomsoccupied'),
        $data['decThisYearRooms'] = DailySales::where('hotel','=','Shard')->where('date', '>=', $currentDecStart)->where('date', '<=',$currentDecEnd)->sum('roomsoccupied')];

        //Last Year Query Variables
        $backOneJanStart = Carbon::create($data['backOneYear'],1)->startOfMonth();
        $backOneFebStart = Carbon::create($data['backOneYear'],2)->startOfMonth();
        $backOneMarStart = Carbon::create($data['backOneYear'],3)->startOfMonth();
        $backOneAprStart = Carbon::create($data['backOneYear'],4)->startOfMonth();
        $backOneMayStart = Carbon::create($data['backOneYear'],5)->startOfMonth();
        $backOneJunStart = Carbon::create($data['backOneYear'],6)->startOfMonth();
        $backOneJulStart = Carbon::create($data['backOneYear'],7)->startOfMonth();
        $backOneAugStart = Carbon::create($data['backOneYear'],8)->startOfMonth();
        $backOneSepStart = Carbon::create($data['backOneYear'],9)->startOfMonth();
        $backOneOctStart = Carbon::create($data['backOneYear'],10)->startOfMonth();
        $backOneNovStart = Carbon::create($data['backOneYear'],11)->startOfMonth();
        $backOneDecStart = Carbon::create($data['backOneYear'],12)->startOfMonth();
        $backOneJanEnd = Carbon::create($data['backOneYear'],1)->endOfMonth();
        $backOneFebEnd = Carbon::create($data['backOneYear'],2)->endOfMonth();
        $backOneMarEnd = Carbon::create($data['backOneYear'],3)->endOfMonth();
        $backOneAprEnd = Carbon::create($data['backOneYear'],4)->endOfMonth();
        $backOneMayEnd = Carbon::create($data['backOneYear'],5)->endOfMonth();
        $backOneJunEnd = Carbon::create($data['backOneYear'],6)->endOfMonth();
        $backOneJulEnd = Carbon::create($data['backOneYear'],7)->endOfMonth();
        $backOneAugEnd = Carbon::create($data['backOneYear'],8)->endOfMonth();
        $backOneSepEnd = Carbon::create($data['backOneYear'],9)->endOfMonth();
        $backOneOctEnd = Carbon::create($data['backOneYear'],10)->endOfMonth();
        $backOneNovEnd = Carbon::create($data['backOneYear'],11)->endOfMonth();
        $backOneDecEnd = Carbon::create($data['backOneYear'],12)->endOfMonth();

        $data['BackOneYearArraySold'] = [
        $data['janBackOneYearRooms'] = DailySales::where('hotel','=','Shard')->where('date', '>=', $backOneJanStart)->where('date', '<=',$backOneJanEnd)->sum('roomsoccupied'),
        $data['febBackOneYearRooms'] = DailySales::where('hotel','=','Shard')->where('date', '>=', $backOneFebStart)->where('date', '<=',$backOneFebEnd)->sum('roomsoccupied'),
        $data['marBackOneYearRooms'] = DailySales::where('hotel','=','Shard')->where('date', '>=', $backOneMarStart)->where('date', '<=',$backOneMarEnd)->sum('roomsoccupied'),
        $data['aprBackOneYearRooms'] = DailySales::where('hotel','=','Shard')->where('date', '>=', $backOneAprStart)->where('date', '<=',$backOneAprEnd)->sum('roomsoccupied'),
        $data['mayBackOneYearRooms'] = DailySales::where('hotel','=','Shard')->where('date', '>=', $backOneMayStart)->where('date', '<=',$backOneMayEnd)->sum('roomsoccupied'),
        $data['junBackOneYearRooms'] = DailySales::where('hotel','=','Shard')->where('date', '>=', $backOneJunStart)->where('date', '<=',$backOneJunEnd)->sum('roomsoccupied'),
        $data['julBackOneYearRooms'] = DailySales::where('hotel','=','Shard')->where('date', '>=', $backOneJulStart)->where('date', '<=',$backOneJulEnd)->sum('roomsoccupied'),
        $data['augBackOneYearRooms'] = DailySales::where('hotel','=','Shard')->where('date', '>=', $backOneAugStart)->where('date', '<=',$backOneAugEnd)->sum('roomsoccupied'),
        $data['sepBackOneYearRooms'] = DailySales::where('hotel','=','Shard')->where('date', '>=', $backOneSepStart)->where('date', '<=',$backOneSepEnd)->sum('roomsoccupied'),
        $data['octBackOneYearRooms'] = DailySales::where('hotel','=','Shard')->where('date', '>=', $backOneOctStart)->where('date', '<=',$backOneOctEnd)->sum('roomsoccupied'),
        $data['novBackOneYearRooms'] = DailySales::where('hotel','=','Shard')->where('date', '>=', $backOneNovStart)->where('date', '<=',$backOneNovEnd)->sum('roomsoccupied'),
        $data['decBackOneYearRooms'] = DailySales::where('hotel','=','Shard')->where('date', '>=', $backOneDecStart)->where('date', '<=',$backOneDecEnd)->sum('roomsoccupied')];

        //Last Year Query Variables
        $backTwoJanStart = Carbon::create($data['backTwoYear'],1)->startOfMonth();
        $backTwoFebStart = Carbon::create($data['backTwoYear'],2)->startOfMonth();
        $backTwoMarStart = Carbon::create($data['backTwoYear'],3)->startOfMonth();
        $backTwoAprStart = Carbon::create($data['backTwoYear'],4)->startOfMonth();
        $backTwoMayStart = Carbon::create($data['backTwoYear'],5)->startOfMonth();
        $backTwoJunStart = Carbon::create($data['backTwoYear'],6)->startOfMonth();
        $backTwoJulStart = Carbon::create($data['backTwoYear'],7)->startOfMonth();
        $backTwoAugStart = Carbon::create($data['backTwoYear'],8)->startOfMonth();
        $backTwoSepStart = Carbon::create($data['backTwoYear'],9)->startOfMonth();
        $backTwoOctStart = Carbon::create($data['backTwoYear'],10)->startOfMonth();
        $backTwoNovStart = Carbon::create($data['backTwoYear'],11)->startOfMonth();
        $backTwoDecStart = Carbon::create($data['backTwoYear'],12)->startOfMonth();
        $backTwoJanEnd = Carbon::create($data['backTwoYear'],1)->endOfMonth();
        $backTwoFebEnd = Carbon::create($data['backTwoYear'],2)->endOfMonth();
        $backTwoMarEnd = Carbon::create($data['backTwoYear'],3)->endOfMonth();
        $backTwoAprEnd = Carbon::create($data['backTwoYear'],4)->endOfMonth();
        $backTwoMayEnd = Carbon::create($data['backTwoYear'],5)->endOfMonth();
        $backTwoJunEnd = Carbon::create($data['backTwoYear'],6)->endOfMonth();
        $backTwoJulEnd = Carbon::create($data['backTwoYear'],7)->endOfMonth();
        $backTwoAugEnd = Carbon::create($data['backTwoYear'],8)->endOfMonth();
        $backTwoSepEnd = Carbon::create($data['backTwoYear'],9)->endOfMonth();
        $backTwoOctEnd = Carbon::create($data['backTwoYear'],10)->endOfMonth();
        $backTwoNovEnd = Carbon::create($data['backTwoYear'],11)->endOfMonth();
        $backTwoDecEnd = Carbon::create($data['backTwoYear'],12)->endOfMonth();

        $data['BackTwoYearArraySold'] = [
        $data['janBackTwoYearRooms'] = DailySales::where('hotel','=','Shard')->where('date', '>=', $backTwoJanStart)->where('date', '<=',$backTwoJanEnd)->sum('roomsoccupied'),
        $data['febBackTwoYearRooms'] = DailySales::where('hotel','=','Shard')->where('date', '>=', $backTwoFebStart)->where('date', '<=',$backTwoFebEnd)->sum('roomsoccupied'),
        $data['marBackTwoYearRooms'] = DailySales::where('hotel','=','Shard')->where('date', '>=', $backTwoMarStart)->where('date', '<=',$backTwoMarEnd)->sum('roomsoccupied'),
        $data['aprBackTwoYearRooms'] = DailySales::where('hotel','=','Shard')->where('date', '>=', $backTwoAprStart)->where('date', '<=',$backTwoAprEnd)->sum('roomsoccupied'),
        $data['mayBackTwoYearRooms'] = DailySales::where('hotel','=','Shard')->where('date', '>=', $backTwoMayStart)->where('date', '<=',$backTwoMayEnd)->sum('roomsoccupied'),
        $data['junBackTwoYearRooms'] = DailySales::where('hotel','=','Shard')->where('date', '>=', $backTwoJunStart)->where('date', '<=',$backTwoJunEnd)->sum('roomsoccupied'),
        $data['julBackTwoYearRooms'] = DailySales::where('hotel','=','Shard')->where('date', '>=', $backTwoJulStart)->where('date', '<=',$backTwoJulEnd)->sum('roomsoccupied'),
        $data['augBackTwoYearRooms'] = DailySales::where('hotel','=','Shard')->where('date', '>=', $backTwoAugStart)->where('date', '<=',$backTwoAugEnd)->sum('roomsoccupied'),
        $data['sepBackTwoYearRooms'] = DailySales::where('hotel','=','Shard')->where('date', '>=', $backTwoSepStart)->where('date', '<=',$backTwoSepEnd)->sum('roomsoccupied'),
        $data['octBackTwoYearRooms'] = DailySales::where('hotel','=','Shard')->where('date', '>=', $backTwoOctStart)->where('date', '<=',$backTwoOctEnd)->sum('roomsoccupied'),
        $data['novBackTwoYearRooms'] = DailySales::where('hotel','=','Shard')->where('date', '>=', $backTwoNovStart)->where('date', '<=',$backTwoNovEnd)->sum('roomsoccupied'),
        $data['decBackTwoYearRooms'] = DailySales::where('hotel','=','Shard')->where('date', '>=', $backTwoDecStart)->where('date', '<=',$backTwoDecEnd)->sum('roomsoccupied')];



        // Calculates the number of rooms that could be sold each month
        foreach($data['CurrentYearArray'] as $DaysInEachMonth){
            array_push($data['CurrentYearDaysArray'], $DaysInEachMonth * $rooms);
         //   array_push($data['CurrentYearRoomsSold'], rand(100,700)); Random Number Generator
            $data['CurrentYearArray'];
        }

        // Calculates the number of rooms that could be sold each month
        foreach($data['BackOneYearArray'] as $DaysInEachMonth){
            array_push($data['BackOneYearDaysArray'], $DaysInEachMonth * $rooms);
          //  echo $DaysInEachMonth ." <- Days Each Month | Rooms at the Shard -> " . $rooms . "=" . $DaysInEachMonth * $rooms . "<br>";
         //   array_push($data['BackOneYearRoomsSold'], rand(100,700)); Random Number Generator
        }
        //dd($data['BackOneYearDaysArray']);
        // Calculates the number of rooms that could be sold each month
        foreach($data['BackTwoYearArray'] as $DaysInEachMonth){
            array_push($data['BackTwoYearDaysArray'], $DaysInEachMonth * $rooms);
         //   array_push($data['BackTwoYearRoomsSold'], rand(100,700)); Random Number Generator
         $data['BackTwoYearArray'];
        }

        $c = 0;
        while($c < 12){
            if($data['CurrentYearArray'][$c] != 0){
                array_push($data['CurrentYearOcc'] , number_format(($data['CurrentYearArraySold'][$c] / $data['CurrentYearDaysArray'][$c])*100,1));
                } else {
                    array_push($data['CurrentYearOcc'] , 0);
                }

            if($data['BackOneYearArray'][$c] != 0){
                array_push($data['BackOneYearOcc'] , number_format(($data['BackOneYearArraySold'][$c] / $data['BackOneYearDaysArray'][$c])*100,1));
                //    echo $data['BackOneYearArray'][$c] . "/" .  $data['BackOneYearDaysArray'][$c] . "=" . (($data['BackOneYearArray'][$c] / $data['BackOneYearDaysArray'][$c])*100) . "<br>";
                } else {
                    array_push($data['BackOneYearOcc'] , 0);
                }

            if($data['BackTwoYearArray'][$c] != 0){
                array_push($data['BackTwoYearOcc'] , number_format(($data['BackTwoYearArraySold'][$c] / $data['BackTwoYearDaysArray'][$c])*100,1));
                } else {
                    array_push($data['BackTwoYearOcc'] , 0);
                }
          //  array_push($data['BackOneYearOcc'] ,number_format(($data['BackOneYearRoomsSold'][$c] / $data['BackOneYearDaysArray'][$c])*100,1));
          //  array_push($data['BackTwoYearOcc'] ,number_format(($data['BackTwoYearRoomsSold'][$c] / $data['BackTwoYearDaysArray'][$c])*100,1));
            $c++;
        }

        $data['CurrentYearTotal'] = DailySales::where('hotel','=','Shard')->whereYear('date','=',date('Y'))->sum('roomsoccupied'); // Replace with totals from the table
        $data['BackOneYearTotal'] = DailySales::where('hotel','=','Shard')->whereYear('date','=',$data['backOneYear'])->sum('roomsoccupied'); // Replace with totals from the table
        $data['BackTwoYearTotal'] = DailySales::where('hotel','=','Shard')->whereYear('date','=',$data['backTwoYear'])->sum('roomsoccupied'); // Replace with totals from the table

        $data['CurrentYearAvg'] = number_format($data['CurrentYearTotal'] / (array_sum($data['CurrentYearArray'])*23) * 100,1);
        $data['BackOneYearAvg'] = number_format($data['BackOneYearTotal'] / (array_sum($data['BackOneYearArray'])*23) * 100,1);
        $data['BackTwoYearAvg'] = number_format($data['BackTwoYearTotal']/ (array_sum($data['BackTwoYearArray'])*23) * 100,1);
        //dd(array_sum($data['CurrentYearArray']));
//dd($data['BackOneYearOcc']);
        return view('admin.hotels.shard.occupancy', $data);
    }

    public function occreportthemill(){
        $data = [];
        $data['CurrentYearArray']= []; // Will be used to track number of days in that month
        $data['CurrentYearDaysArray']= []; // Will be used to calculate the number of days in that month
        $data['BackOneYearArray']= []; // Will be used to track number of days in that month
        $data['BackOneYearDaysArray']= [];// Will be used to calculate the number of days in that month
        $data['BackTwoYearArray']= []; // Will be used to track number of days in that month
        $data['BackTwoYearDaysArray']= [];// Will be used to calculate the number of days in that month
        $data['CurrentYearRoomsSold']= []; // Random Number array that will be replaced my data in the future.
        $data['BackOneYearRoomsSold']= []; // Random Number array that will be replaced my data in the future.
        $data['BackTwoYearRoomsSold']= []; // Random Number array that will be replaced my data in the future.
        $data['CurrentYearOcc']= []; // Random Number array that will be replaced my data in the future.
        $data['BackOneYearOcc']= []; // Random Number array that will be replaced my data in the future.
        $data['BackTwoYearOcc']= []; // Random Number array that will be replaced my data in the future.
        $rooms = 21; // Number of Rooms the Mill has


        // Formula for Occ Report
        // Occ Rate = (Rooms Sold / (days of the month x 23)) * 100
        $data['currentYear'] = Carbon::createFromDate(null)->format('Y');
        $data['backOneYear'] = $data['currentYear'] - 1;
        $data['backTwoYear'] = $data['currentYear'] - 2;

        // Works out Days in each Month for Current Year and going back two.
        $i = 1; // Counter
        while($i<=12){
            array_push($data['CurrentYearArray'], Carbon::createFromDate(null, $i)->daysInMonth); // Counts days in each month and puts it into an array
            array_push($data['BackOneYearArray'], Carbon::createFromDate($data['backOneYear'], $i)->daysInMonth); // Counts days in each month and puts it into an array
            array_push($data['BackTwoYearArray'], Carbon::createFromDate($data['backTwoYear'], $i)->daysInMonth); // Counts days in each month and puts it into an array
            $i++;
        }
        //dd($data['BackOneYearArray']);
        // Finds All Room Sales This Year for the Shard
        //dd($data['CurrentYearRoomsSold'] = DailySales::where('hotel','=','Shard')->whereYear('date','=',date('Y'))->pluck('roomsoccupied')) ;

        //Current Year Query Variables
        $currentJanStart = Carbon::create($data['currentYear'],1)->startOfMonth();
        $currentFebStart = Carbon::create($data['currentYear'],2)->startOfMonth();
        $currentMarStart = Carbon::create($data['currentYear'],3)->startOfMonth();
        $currentAprStart = Carbon::create($data['currentYear'],4)->startOfMonth();
        $currentMayStart = Carbon::create($data['currentYear'],5)->startOfMonth();
        $currentJunStart = Carbon::create($data['currentYear'],6)->startOfMonth();
        $currentJulStart = Carbon::create($data['currentYear'],7)->startOfMonth();
        $currentAugStart = Carbon::create($data['currentYear'],8)->startOfMonth();
        $currentSepStart = Carbon::create($data['currentYear'],9)->startOfMonth();
        $currentOctStart = Carbon::create($data['currentYear'],10)->startOfMonth();
        $currentNovStart = Carbon::create($data['currentYear'],11)->startOfMonth();
        $currentDecStart = Carbon::create($data['currentYear'],12)->startOfMonth();
        $currentJanEnd = Carbon::create($data['currentYear'],1)->endOfMonth();
        $currentFebEnd = Carbon::create($data['currentYear'],2)->endOfMonth();
        $currentMarEnd = Carbon::create($data['currentYear'],3)->endOfMonth();
        $currentAprEnd = Carbon::create($data['currentYear'],4)->endOfMonth();
        $currentMayEnd = Carbon::create($data['currentYear'],5)->endOfMonth();
        $currentJunEnd = Carbon::create($data['currentYear'],6)->endOfMonth();
        $currentJulEnd = Carbon::create($data['currentYear'],7)->endOfMonth();
        $currentAugEnd = Carbon::create($data['currentYear'],8)->endOfMonth();
        $currentSepEnd = Carbon::create($data['currentYear'],9)->endOfMonth();
        $currentOctEnd = Carbon::create($data['currentYear'],10)->endOfMonth();
        $currentNovEnd = Carbon::create($data['currentYear'],11)->endOfMonth();
        $currentDecEnd = Carbon::create($data['currentYear'],12)->endOfMonth();

        $data['CurrentYearArraySold'] = [
        $data['janThisYearRooms'] = DailySales::where('hotel','=','The Mill')->where('date', '>=', $currentJanStart)->where('date', '<=',$currentJanEnd)->sum('roomsoccupied'),
        $data['febThisYearRooms'] = DailySales::where('hotel','=','The Mill')->where('date', '>=', $currentFebStart)->where('date', '<=',$currentFebEnd)->sum('roomsoccupied'),
        $data['marThisYearRooms'] = DailySales::where('hotel','=','The Mill')->where('date', '>=', $currentMarStart)->where('date', '<=',$currentMarEnd)->sum('roomsoccupied'),
        $data['aprThisYearRooms'] = DailySales::where('hotel','=','The Mill')->where('date', '>=', $currentAprStart)->where('date', '<=',$currentAprEnd)->sum('roomsoccupied'),
        $data['mayThisYearRooms'] = DailySales::where('hotel','=','The Mill')->where('date', '>=', $currentMayStart)->where('date', '<=',$currentMayEnd)->sum('roomsoccupied'),
        $data['junThisYearRooms'] = DailySales::where('hotel','=','The Mill')->where('date', '>=', $currentJunStart)->where('date', '<=',$currentJunEnd)->sum('roomsoccupied'),
        $data['julThisYearRooms'] = DailySales::where('hotel','=','The Mill')->where('date', '>=', $currentJulStart)->where('date', '<=',$currentJulEnd)->sum('roomsoccupied'),
        $data['augThisYearRooms'] = DailySales::where('hotel','=','The Mill')->where('date', '>=', $currentAugStart)->where('date', '<=',$currentAugEnd)->sum('roomsoccupied'),
        $data['sepThisYearRooms'] = DailySales::where('hotel','=','The Mill')->where('date', '>=', $currentSepStart)->where('date', '<=',$currentSepEnd)->sum('roomsoccupied'),
        $data['octThisYearRooms'] = DailySales::where('hotel','=','The Mill')->where('date', '>=', $currentOctStart)->where('date', '<=',$currentOctEnd)->sum('roomsoccupied'),
        $data['novThisYearRooms'] = DailySales::where('hotel','=','The Mill')->where('date', '>=', $currentNovStart)->where('date', '<=',$currentNovEnd)->sum('roomsoccupied'),
        $data['decThisYearRooms'] = DailySales::where('hotel','=','The Mill')->where('date', '>=', $currentDecStart)->where('date', '<=',$currentDecEnd)->sum('roomsoccupied')];

        //Last Year Query Variables
        $backOneJanStart = Carbon::create($data['backOneYear'],1)->startOfMonth();
        $backOneFebStart = Carbon::create($data['backOneYear'],2)->startOfMonth();
        $backOneMarStart = Carbon::create($data['backOneYear'],3)->startOfMonth();
        $backOneAprStart = Carbon::create($data['backOneYear'],4)->startOfMonth();
        $backOneMayStart = Carbon::create($data['backOneYear'],5)->startOfMonth();
        $backOneJunStart = Carbon::create($data['backOneYear'],6)->startOfMonth();
        $backOneJulStart = Carbon::create($data['backOneYear'],7)->startOfMonth();
        $backOneAugStart = Carbon::create($data['backOneYear'],8)->startOfMonth();
        $backOneSepStart = Carbon::create($data['backOneYear'],9)->startOfMonth();
        $backOneOctStart = Carbon::create($data['backOneYear'],10)->startOfMonth();
        $backOneNovStart = Carbon::create($data['backOneYear'],11)->startOfMonth();
        $backOneDecStart = Carbon::create($data['backOneYear'],12)->startOfMonth();
        $backOneJanEnd = Carbon::create($data['backOneYear'],1)->endOfMonth();
        $backOneFebEnd = Carbon::create($data['backOneYear'],2)->endOfMonth();
        $backOneMarEnd = Carbon::create($data['backOneYear'],3)->endOfMonth();
        $backOneAprEnd = Carbon::create($data['backOneYear'],4)->endOfMonth();
        $backOneMayEnd = Carbon::create($data['backOneYear'],5)->endOfMonth();
        $backOneJunEnd = Carbon::create($data['backOneYear'],6)->endOfMonth();
        $backOneJulEnd = Carbon::create($data['backOneYear'],7)->endOfMonth();
        $backOneAugEnd = Carbon::create($data['backOneYear'],8)->endOfMonth();
        $backOneSepEnd = Carbon::create($data['backOneYear'],9)->endOfMonth();
        $backOneOctEnd = Carbon::create($data['backOneYear'],10)->endOfMonth();
        $backOneNovEnd = Carbon::create($data['backOneYear'],11)->endOfMonth();
        $backOneDecEnd = Carbon::create($data['backOneYear'],12)->endOfMonth();

        $data['BackOneYearArraySold'] = [
        $data['janBackOneYearRooms'] = DailySales::where('hotel','=','The Mill')->where('date', '>=', $backOneJanStart)->where('date', '<=',$backOneJanEnd)->sum('roomsoccupied'),
        $data['febBackOneYearRooms'] = DailySales::where('hotel','=','The Mill')->where('date', '>=', $backOneFebStart)->where('date', '<=',$backOneFebEnd)->sum('roomsoccupied'),
        $data['marBackOneYearRooms'] = DailySales::where('hotel','=','The Mill')->where('date', '>=', $backOneMarStart)->where('date', '<=',$backOneMarEnd)->sum('roomsoccupied'),
        $data['aprBackOneYearRooms'] = DailySales::where('hotel','=','The Mill')->where('date', '>=', $backOneAprStart)->where('date', '<=',$backOneAprEnd)->sum('roomsoccupied'),
        $data['mayBackOneYearRooms'] = DailySales::where('hotel','=','The Mill')->where('date', '>=', $backOneMayStart)->where('date', '<=',$backOneMayEnd)->sum('roomsoccupied'),
        $data['junBackOneYearRooms'] = DailySales::where('hotel','=','The Mill')->where('date', '>=', $backOneJunStart)->where('date', '<=',$backOneJunEnd)->sum('roomsoccupied'),
        $data['julBackOneYearRooms'] = DailySales::where('hotel','=','The Mill')->where('date', '>=', $backOneJulStart)->where('date', '<=',$backOneJulEnd)->sum('roomsoccupied'),
        $data['augBackOneYearRooms'] = DailySales::where('hotel','=','The Mill')->where('date', '>=', $backOneAugStart)->where('date', '<=',$backOneAugEnd)->sum('roomsoccupied'),
        $data['sepBackOneYearRooms'] = DailySales::where('hotel','=','The Mill')->where('date', '>=', $backOneSepStart)->where('date', '<=',$backOneSepEnd)->sum('roomsoccupied'),
        $data['octBackOneYearRooms'] = DailySales::where('hotel','=','The Mill')->where('date', '>=', $backOneOctStart)->where('date', '<=',$backOneOctEnd)->sum('roomsoccupied'),
        $data['novBackOneYearRooms'] = DailySales::where('hotel','=','The Mill')->where('date', '>=', $backOneNovStart)->where('date', '<=',$backOneNovEnd)->sum('roomsoccupied'),
        $data['decBackOneYearRooms'] = DailySales::where('hotel','=','The Mill')->where('date', '>=', $backOneDecStart)->where('date', '<=',$backOneDecEnd)->sum('roomsoccupied')];

        //Last Year Query Variables
        $backTwoJanStart = Carbon::create($data['backTwoYear'],1)->startOfMonth();
        $backTwoFebStart = Carbon::create($data['backTwoYear'],2)->startOfMonth();
        $backTwoMarStart = Carbon::create($data['backTwoYear'],3)->startOfMonth();
        $backTwoAprStart = Carbon::create($data['backTwoYear'],4)->startOfMonth();
        $backTwoMayStart = Carbon::create($data['backTwoYear'],5)->startOfMonth();
        $backTwoJunStart = Carbon::create($data['backTwoYear'],6)->startOfMonth();
        $backTwoJulStart = Carbon::create($data['backTwoYear'],7)->startOfMonth();
        $backTwoAugStart = Carbon::create($data['backTwoYear'],8)->startOfMonth();
        $backTwoSepStart = Carbon::create($data['backTwoYear'],9)->startOfMonth();
        $backTwoOctStart = Carbon::create($data['backTwoYear'],10)->startOfMonth();
        $backTwoNovStart = Carbon::create($data['backTwoYear'],11)->startOfMonth();
        $backTwoDecStart = Carbon::create($data['backTwoYear'],12)->startOfMonth();
        $backTwoJanEnd = Carbon::create($data['backTwoYear'],1)->endOfMonth();
        $backTwoFebEnd = Carbon::create($data['backTwoYear'],2)->endOfMonth();
        $backTwoMarEnd = Carbon::create($data['backTwoYear'],3)->endOfMonth();
        $backTwoAprEnd = Carbon::create($data['backTwoYear'],4)->endOfMonth();
        $backTwoMayEnd = Carbon::create($data['backTwoYear'],5)->endOfMonth();
        $backTwoJunEnd = Carbon::create($data['backTwoYear'],6)->endOfMonth();
        $backTwoJulEnd = Carbon::create($data['backTwoYear'],7)->endOfMonth();
        $backTwoAugEnd = Carbon::create($data['backTwoYear'],8)->endOfMonth();
        $backTwoSepEnd = Carbon::create($data['backTwoYear'],9)->endOfMonth();
        $backTwoOctEnd = Carbon::create($data['backTwoYear'],10)->endOfMonth();
        $backTwoNovEnd = Carbon::create($data['backTwoYear'],11)->endOfMonth();
        $backTwoDecEnd = Carbon::create($data['backTwoYear'],12)->endOfMonth();

        $data['BackTwoYearArraySold'] = [
        $data['janBackTwoYearRooms'] = DailySales::where('hotel','=','The Mill')->where('date', '>=', $backTwoJanStart)->where('date', '<=',$backTwoJanEnd)->sum('roomsoccupied'),
        $data['febBackTwoYearRooms'] = DailySales::where('hotel','=','The Mill')->where('date', '>=', $backTwoFebStart)->where('date', '<=',$backTwoFebEnd)->sum('roomsoccupied'),
        $data['marBackTwoYearRooms'] = DailySales::where('hotel','=','The Mill')->where('date', '>=', $backTwoMarStart)->where('date', '<=',$backTwoMarEnd)->sum('roomsoccupied'),
        $data['aprBackTwoYearRooms'] = DailySales::where('hotel','=','The Mill')->where('date', '>=', $backTwoAprStart)->where('date', '<=',$backTwoAprEnd)->sum('roomsoccupied'),
        $data['mayBackTwoYearRooms'] = DailySales::where('hotel','=','The Mill')->where('date', '>=', $backTwoMayStart)->where('date', '<=',$backTwoMayEnd)->sum('roomsoccupied'),
        $data['junBackTwoYearRooms'] = DailySales::where('hotel','=','The Mill')->where('date', '>=', $backTwoJunStart)->where('date', '<=',$backTwoJunEnd)->sum('roomsoccupied'),
        $data['julBackTwoYearRooms'] = DailySales::where('hotel','=','The Mill')->where('date', '>=', $backTwoJulStart)->where('date', '<=',$backTwoJulEnd)->sum('roomsoccupied'),
        $data['augBackTwoYearRooms'] = DailySales::where('hotel','=','The Mill')->where('date', '>=', $backTwoAugStart)->where('date', '<=',$backTwoAugEnd)->sum('roomsoccupied'),
        $data['sepBackTwoYearRooms'] = DailySales::where('hotel','=','The Mill')->where('date', '>=', $backTwoSepStart)->where('date', '<=',$backTwoSepEnd)->sum('roomsoccupied'),
        $data['octBackTwoYearRooms'] = DailySales::where('hotel','=','The Mill')->where('date', '>=', $backTwoOctStart)->where('date', '<=',$backTwoOctEnd)->sum('roomsoccupied'),
        $data['novBackTwoYearRooms'] = DailySales::where('hotel','=','The Mill')->where('date', '>=', $backTwoNovStart)->where('date', '<=',$backTwoNovEnd)->sum('roomsoccupied'),
        $data['decBackTwoYearRooms'] = DailySales::where('hotel','=','The Mill')->where('date', '>=', $backTwoDecStart)->where('date', '<=',$backTwoDecEnd)->sum('roomsoccupied')];



        // Calculates the number of rooms that could be sold each month
        foreach($data['CurrentYearArray'] as $DaysInEachMonth){
            array_push($data['CurrentYearDaysArray'], $DaysInEachMonth * $rooms);
         //   array_push($data['CurrentYearRoomsSold'], rand(100,700)); Random Number Generator
            $data['CurrentYearArray'];
        }

        // Calculates the number of rooms that could be sold each month
        foreach($data['BackOneYearArray'] as $DaysInEachMonth){
            array_push($data['BackOneYearDaysArray'], $DaysInEachMonth * $rooms);
          //  echo $DaysInEachMonth ." <- Days Each Month | Rooms at the Shard -> " . $rooms . "=" . $DaysInEachMonth * $rooms . "<br>";
         //   array_push($data['BackOneYearRoomsSold'], rand(100,700)); Random Number Generator
        }
        //dd($data['BackOneYearDaysArray']);
        // Calculates the number of rooms that could be sold each month
        foreach($data['BackTwoYearArray'] as $DaysInEachMonth){
            array_push($data['BackTwoYearDaysArray'], $DaysInEachMonth * $rooms);
         //   array_push($data['BackTwoYearRoomsSold'], rand(100,700)); Random Number Generator
         $data['BackTwoYearArray'];
        }

        $c = 0;
        while($c < 12){
            if($data['CurrentYearArray'][$c] != 0){
                array_push($data['CurrentYearOcc'] , number_format(($data['CurrentYearArraySold'][$c] / $data['CurrentYearDaysArray'][$c])*100,1));
                } else {
                    array_push($data['CurrentYearOcc'] , 0);
                }

            if($data['BackOneYearArray'][$c] != 0){
                array_push($data['BackOneYearOcc'] , number_format(($data['BackOneYearArraySold'][$c] / $data['BackOneYearDaysArray'][$c])*100,1));
                //    echo $data['BackOneYearArray'][$c] . "/" .  $data['BackOneYearDaysArray'][$c] . "=" . (($data['BackOneYearArray'][$c] / $data['BackOneYearDaysArray'][$c])*100) . "<br>";
                } else {
                    array_push($data['BackOneYearOcc'] , 0);
                }

            if($data['BackTwoYearArray'][$c] != 0){
                array_push($data['BackTwoYearOcc'] , number_format(($data['BackTwoYearArraySold'][$c] / $data['BackTwoYearDaysArray'][$c])*100,1));
                } else {
                    array_push($data['BackTwoYearOcc'] , 0);
                }
          //  array_push($data['BackOneYearOcc'] ,number_format(($data['BackOneYearRoomsSold'][$c] / $data['BackOneYearDaysArray'][$c])*100,1));
          //  array_push($data['BackTwoYearOcc'] ,number_format(($data['BackTwoYearRoomsSold'][$c] / $data['BackTwoYearDaysArray'][$c])*100,1));
            $c++;
        }

        $data['CurrentYearTotal'] = DailySales::where('hotel','=','The Mill')->whereYear('date','=',date('Y'))->sum('roomsoccupied'); // Replace with totals from the table
        $data['BackOneYearTotal'] = DailySales::where('hotel','=','The Mill')->whereYear('date','=',$data['backOneYear'])->sum('roomsoccupied'); // Replace with totals from the table
        $data['BackTwoYearTotal'] = DailySales::where('hotel','=','The Mill')->whereYear('date','=',$data['backTwoYear'])->sum('roomsoccupied'); // Replace with totals from the table

        $data['CurrentYearAvg'] = number_format($data['CurrentYearTotal'] / (array_sum($data['CurrentYearArray'])*23) * 100,1);
        $data['BackOneYearAvg'] = number_format($data['BackOneYearTotal'] / (array_sum($data['BackOneYearArray'])*23) * 100,1);
        $data['BackTwoYearAvg'] = number_format($data['BackTwoYearTotal']/ (array_sum($data['BackTwoYearArray'])*23) * 100,1);
//dd($data['BackOneYearOcc']);
        return view('admin.hotels.themill.occupancy', $data);
    }
}
