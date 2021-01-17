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
            'roomsoccupied' => 'numeric',
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
        $startOfWeek = Carbon::create(2021,1,11);

        $days = [
            'Monday',
            'Tuesday',
            'Wednesday',
            'Thursday',
            'Friday',
            'Saturday',
            'Sunday'
            ];

        $data = [];
        $data['dailysales'] = DailySales::orderBy('date','asc')->get();
        $data['currentweek'] = DailySales::pluck('date');

        $data['weeklysales'] = DailySales::orderBy('date','asc')->where('date','>=',$startOfWeek)->limit(7)->get();
        //dd($data['weeklysales']);

        foreach ($days as $day => $val) {

            $data['daysofweek'][$val] = DailySales::where('date', $startOfWeek)->get();

            $startOfWeek = $startOfWeek->addDay();

        }



        return view('admin.hotels.salessheet', $data);
    }


}
