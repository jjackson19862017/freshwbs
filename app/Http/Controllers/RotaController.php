<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;
use App\Libraries\General;
use App\Models\Rota;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Support\Arr;

class RotaController extends Controller
{
    //
    public function rotashard(){
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



        return view('admin.hotels.shard.rota',$data);
    }

    public function createrota(Staff $staff){
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

        $data['staff'] = Staff::find($staff)->first();
        //dd($data['staff']);
        $data['MondayRoleOne']      = General::getEnumValues('rotas','MondayRoleOne') ;
        $data['MondayRoleTwo']      = General::getEnumValues('rotas','MondayRoleTwo') ;
        $data['TuesdayRoleOne']     = General::getEnumValues('rotas','TuesdayRoleOne') ;
        $data['TuesdayRoleTwo']     = General::getEnumValues('rotas','TuesdayRoleTwo') ;
        $data['WednesdayRoleOne']   = General::getEnumValues('rotas','WednesdayRoleOne') ;
        $data['WednesdayRoleTwo']   = General::getEnumValues('rotas','WednesdayRoleTwo') ;
        $data['ThursdayRoleOne']    = General::getEnumValues('rotas','ThursdayRoleOne') ;
        $data['ThursdayRoleTwo']    = General::getEnumValues('rotas','ThursdayRoleTwo') ;
        $data['FridayRoleOne']      = General::getEnumValues('rotas','FridayRoleOne') ;
        $data['FridayRoleTwo']      = General::getEnumValues('rotas','FridayRoleTwo') ;
        $data['SaturdayRoleOne']    = General::getEnumValues('rotas','SaturdayRoleOne') ;
        $data['SaturdayRoleTwo']    = General::getEnumValues('rotas','SaturdayRoleTwo') ;
        $data['SundayRoleOne']      = General::getEnumValues('rotas','SundayRoleOne') ;
        $data['SundayRoleTwo']      = General::getEnumValues('rotas','SundayRoleTwo') ;
            return view('admin.hotels.createrota',$data);
        }



    public function storerota(Request $request){
        $validator = Validator::make($request->all(),[
            'staffid' => 'required|numeric',
            'hotel' => 'required',
            'availableDates' => 'date',
            'MondayStartOne' => 'bail|required_unless:MondayRoleOne,Off',
            'MondayFinishOne' => 'bail|required_unless:MondayRoleOne,Off',
            'MondayRoleOne' => 'required',
            //'mondayStartTwo' => 'required_if:mondayRoleTwo,not(off)|date_format:H:i',
            //'mondayFinishTwo' => 'required_if:mondayRoleTwo,not(off)|date_format:H:i',
            //'mondayRoleTwo' => 'required',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        //dd($validator);
        $input = [
            'Staff_Id' => $request->input('staffid'),
            'WeekCommencing' => $request->input('availableDates'),
            'Hotel' => $request->input('hotel'),
            'SickDays' => $request->input('sickDays'),
            'HolidayDays' => $request->input('holidays'),
            'MondayStartOne' => $request->input('MondayStartOne'),
            'MondayFinishOne' => $request->input('MondayFinishOne'),
            'MondayRoleOne' => $request->input('MondayRoleOne'),
            'MondayStartTwo' => $request->input('MondayStartTwo'),
            'MondayFinishTwo' => $request->input('MondayFinishTwo'),
            'MondayRoleTwo' => $request->input('MondayRoleTwo'),
            'TuesdayStartOne' => $request->input('TuesdayStartOne'),
            'TuesdayFinishOne' => $request->input('TuesdayFinishOne'),
            'TuesdayRoleOne' => $request->input('TuesdayRoleOne'),
            'TuesdayStartTwo' => $request->input('TuesdayStartTwo'),
            'TuesdayFinishTwo' => $request->input('TuesdayFinishTwo'),
            'TuesdayRoleTwo' => $request->input('TuesdayRoleTwo'),
            'WednesdayStartOne' => $request->input('WednesdayStartOne'),
            'WednesdayFinishOne' => $request->input('WednesdayFinishOne'),
            'WednesdayRoleOne' => $request->input('WednesdayRoleOne'),
            'WednesdayStartTwo' => $request->input('WednesdayStartTwo'),
            'WednesdayFinishTwo' => $request->input('WednesdayFinishTwo'),
            'WednesdayRoleTwo' => $request->input('WednesdayRoleTwo'),
            'ThursdayStartOne' => $request->input('ThursdayStartOne'),
            'ThursdayFinishOne' => $request->input('ThursdayFinishOne'),
            'ThursdayRoleOne' => $request->input('ThursdayRoleOne'),
            'ThursdayStartTwo' => $request->input('ThursdayStartTwo'),
            'ThursdayFinishTwo' => $request->input('ThursdayFinishTwo'),
            'ThursdayRoleTwo' => $request->input('ThursdayRoleTwo'),
            'FridayStartOne' => $request->input('FridayStartOne'),
            'FridayFinishOne' => $request->input('FridayFinishOne'),
            'FridayRoleOne' => $request->input('FridayRoleOne'),
            'FridayStartTwo' => $request->input('FridayStartTwo'),
            'FridayFinishTwo' => $request->input('FridayFinishTwo'),
            'FridayRoleTwo' => $request->input('FridayRoleTwo'),
            'SaturdayStartOne' => $request->input('SaturdayStartOne'),
            'SaturdayFinishOne' => $request->input('SaturdayFinishOne'),
            'SaturdayRoleOne' => $request->input('SaturdayRoleOne'),
            'SaturdayStartTwo' => $request->input('SaturdayStartTwo'),
            'SaturdayFinishTwo' => $request->input('SaturdayFinishTwo'),
            'SaturdayRoleTwo' => $request->input('SaturdayRoleTwo'),
            'SundayStartOne' => $request->input('SundayStartOne'),
            'SundayFinishOne' => $request->input('SundayFinishOne'),
            'SundayRoleOne' => $request->input('SundayRoleOne'),
            'SundayStartTwo' => $request->input('SundayStartTwo'),
            'SundayFinishTwo' => $request->input('SundayFinishTwo'),
            'SundayRoleTwo' => $request->input('SundayRoleTwo'),
            'MondayHoursOne' => $request->input('MondayHoursOne'),
            'MondayHoursTwo' => $request->input('MondayHoursTwo'),
            'TuesdayHoursOne' => $request->input('TuesdayHoursOne'),
            'TuesdayHoursTwo' => $request->input('TuesdayHoursTwo'),
            'WednesdayHoursOne' => $request->input('WednesdayHoursOne'),
            'WednesdayHoursTwo' => $request->input('WednesdayHoursTwo'),
            'ThursdayHoursOne' => $request->input('ThursdayHoursOne'),
            'ThursdayHoursTwo' => $request->input('ThursdayHoursTwo'),
            'FridayHoursOne' => $request->input('FridayHoursOne'),
            'FridayHoursTwo' => $request->input('FridayHoursTwo'),
            'SaturdayHoursOne' => $request->input('SaturdayHoursOne'),
            'SaturdayHoursTwo' => $request->input('SaturdayHoursTwo'),
            'SundayHoursOne' => $request->input('SundayHoursOne'),
            'SundayHoursTwo' => $request->input('SundayHoursTwo'),
            'JsHours' => 0,
        ];
//dd('inputs');
        $newId = Rota::create($input)->id;
        $request->session()->flash('message', 'Rota was Created... ');
        $request->session()->flash('text-class', 'text-success');
        //return redirect()->route('admin.hotels.shard.rota');
    }
}
