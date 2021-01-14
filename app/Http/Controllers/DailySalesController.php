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
        $data = [];
        $data['dailysales'] = DailySales::all();
        $data['currentweek'] = DailySales::pluck('date');



        $data['currentweek'] = $data['currentweek']->map(function($item, $key){
            return Carbon::create($item)->format('d m y');
        });

        $startOfWeek = Carbon::create(2021,1,11);

        $data['monday'] = DailySales::where('date','=',Carbon::create(2021,1,18))->get();

        if(!$data['monday']->isEmpty()){
        $data['monday'] = DailySales::where('date','=',$startOfWeek)->get();
    } else {
        $id = DailySales::insert(['date'=>Carbon::create(2021,1,18), 'hotel'=>"Shard", 'user_id'=>99,'iou'=>0,'bacs'=>0,'cheque'=>0,'pdqreception'=>0,'pdqbar'=>0,'pdqrestaurant'=>0,'cashtotal'=>0,'gpostotal'=>0,'cashsafe'=>0]);
        $data['monday'] = DailySales::find($id)->first();
    }
        $data['tuesday'] = DailySales::where('date','=',$startOfWeek->addDay())->get();
        $data['wednesday'] = DailySales::where('date','=',$startOfWeek->addDay())->get();
        $data['thursday'] = DailySales::where('date','=',$startOfWeek->addDay())->get();
        $data['friday'] = DailySales::where('date','=',$startOfWeek->addDay())->get();
        $data['saturday'] = DailySales::where('date','=',$startOfWeek->addDay())->get();
        $data['sunday'] = DailySales::where('date','=',$startOfWeek->addDay())->get();


        return view('admin.hotels.salessheet', $data);
    }


}
