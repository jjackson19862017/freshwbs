<?php

namespace App\Http\Controllers;

use App\Models\DailySales;
use Illuminate\Http\Request;
use App\Models\Staff;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

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
        $data['sales'] = DailySales::orderBy('date')->get();
//dd($data['sales']);
        return view('admin.hotels.sales.allmoneysales', $data);
    }

    public function yearlysetup(){
        $currentYear = Carbon::createFromDate(null)->format('Y');
        $startDate = Carbon::createFromDate($currentYear,1,1);
        $endDate = Carbon::createFromDate($currentYear,12,31);
        while($startDate <= $endDate){
            $insert = DailySales::insert(['date'=>$startDate->format('Y-m-d'), 'user_id'=>0, 'hotel' =>'Shard']);
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
        $mondaySelection = array_reverse($arrayMondays);
        return $mondaySelection;
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
        $data['shardweeklytotalbacs'] = DailySales::orderBy('date','asc')->where('hotel','=','Shard')->where('date','>=',$startOfWeek)->limit(7)->pluck('bacs')->sum();
        //$data['themillweeklysales'] = DailySales::orderBy('date','asc')->where('hotel','=','The Mill')->where('date','>=',$startOfWeek)->limit(7)->get();

        $data['shardweeklytotalcards'] = DailySales::orderBy('date','asc')->where('hotel','=','Shard')->where('date','>=',$startOfWeek)->limit(7)->pluck('cardtotal')->sum();

        $data['shardweeklytotalcash'] = DailySales::orderBy('date','asc')->where('hotel','=','Shard')->where('date','>=',$startOfWeek)->limit(7)->pluck('cashtotal')->sum();
        $data['shardweeklytotalgpos'] = DailySales::orderBy('date','asc')->where('hotel','=','Shard')->where('date','>=',$startOfWeek)->limit(7)->pluck('gpostotal')->sum();
        $data['shardweeklytotalsafe'] = DailySales::orderBy('date','asc')->where('hotel','=','Shard')->where('date','>=',$startOfWeek)->limit(7)->pluck('cashsafe')->sum();

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
        $data['mondaySelection'] = array_reverse($arrayMondays);  // Orders it so the latest date is at the top of the list.

//dd($data['daysofweek']);

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

        $data['shardweeklytotalcards'] = DailySales::orderBy('date','asc')->where('hotel','=','Shard')->where('date','>=',$startOfWeek)->limit(7)->pluck('cardtotal')->sum();

        $data['shardweeklytotalcash'] = DailySales::orderBy('date','asc')->where('hotel','=','Shard')->where('date','>=',$startOfWeek)->limit(7)->pluck('cashtotal')->sum();
        $data['shardweeklytotalgpos'] = DailySales::orderBy('date','asc')->where('hotel','=','Shard')->where('date','>=',$startOfWeek)->limit(7)->pluck('gpostotal')->sum();
        $data['shardweeklytotalsafe'] = DailySales::orderBy('date','asc')->where('hotel','=','Shard')->where('date','>=',$startOfWeek)->limit(7)->pluck('cashsafe')->sum();


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
        $data['mondaySelection'] = array_reverse($arrayMondays);  // Orders it so the latest date is at the top of the list.

//dd($data['daysofweek']);

        return view('admin.hotels.salessheet', $data);
    }

    public function occreport(){
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
        $roomsShard = 23; // Number of Rooms the Shard has
        // Formula for Occ Report
        // Occ Rate = (Rooms Sold / (days of the month x 23)) * 100
        $data['currentYear'] = Carbon::createFromDate(null)->format('Y');
        $data['backOneYear'] = $data['currentYear'] - 1;
        $data['backTwoYear'] = $data['currentYear'] - 2;
        $i = 1; // Counter
        while($i<=12){
            array_push($data['CurrentYearArray'], Carbon::createFromDate(null, $i)->daysInMonth); // Counts days in each month and puts it into an array
            array_push($data['BackOneYearArray'], Carbon::createFromDate($data['backOneYear'], $i)->daysInMonth); // Counts days in each month and puts it into an array
            array_push($data['BackTwoYearArray'], Carbon::createFromDate($data['backTwoYear'], $i)->daysInMonth); // Counts days in each month and puts it into an array
            $i++;
        }

        // Calculates the number of rooms that could be sold each month
        foreach($data['CurrentYearArray'] as $M){
            array_push($data['CurrentYearDaysArray'], $M * $roomsShard);
            array_push($data['CurrentYearRoomsSold'], rand(100,700));
        }
        // Calculates the number of rooms that could be sold each month
        foreach($data['BackOneYearArray'] as $M){
            array_push($data['BackOneYearDaysArray'], $M * $roomsShard);
            array_push($data['BackOneYearRoomsSold'], rand(100,700));
        }
        // Calculates the number of rooms that could be sold each month
        foreach($data['BackTwoYearArray'] as $M){
            array_push($data['BackTwoYearDaysArray'], $M * $roomsShard);
            array_push($data['BackTwoYearRoomsSold'], rand(100,700));
        }

        $c = 0;
        while($c < 12){
            array_push($data['CurrentYearOcc'] ,number_format(($data['CurrentYearRoomsSold'][$c] / $data['CurrentYearDaysArray'][$c])*100,1));
            array_push($data['BackOneYearOcc'] ,number_format(($data['BackOneYearRoomsSold'][$c] / $data['BackOneYearDaysArray'][$c])*100,1));
            array_push($data['BackTwoYearOcc'] ,number_format(($data['BackTwoYearRoomsSold'][$c] / $data['BackTwoYearDaysArray'][$c])*100,1));
            $c++;
        }

        dd($data['CurrentYearOcc']);
    }
}
