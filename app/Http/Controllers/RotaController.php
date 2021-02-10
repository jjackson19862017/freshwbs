<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;
use App\Libraries\General;
use App\Models\Rota;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Validation\Rule;

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
        $datevar = Carbon::now(); // Gets current date
        while($datevar != Carbon::parse($datevar)->isDayOfWeek(Carbon::MONDAY)){
            $datevar = $datevar->subDay(); // While the date isnt a Monday subtract a day till it is Monday
        }
        $data['thisweekdate'] = $datevar;
        $data['thisweekdate'] = $data['thisweekdate']->format('Y-m-d');
        $data['nextweekdate'] = $datevar->addWeek()->format('Y-m-d');
        $data['thisWeeksRota'] = Rota::where('WeekCommencing','=',$data['thisweekdate'])->get();


        foreach ($data['days'] as $day) {
            $data[$day .'Hours'] = $data['thisWeeksRota']->sum($day .'HoursOne') + $data['thisWeeksRota']->sum($day .'HoursTwo');
            //echo $data[$day .'Hours'];
        }
        //dd($data['MondayHours']);

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

            //if Mondays can only be allowed to be on the list if the staff_id doesnt have a date record.




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
        $days = [
            'Monday',
            'Tuesday',
            'Wednesday',
            'Thursday',
            'Friday',
            'Saturday',
            'Sunday'
            ];

        $validator = Validator::make($request->all(),[
            'staffid' => 'required|numeric',
            'hotel' => 'required',
            'WeekCommencing' => ['date', Rule::unique('rotas')->where('WeekCommencing', $request->input('WeekCommencing'))->where('Staff_Id', $request->input('staffid'))],
            'MondayStartOne' => 'bail|required_unless:MondayRoleOne,Off,Sick,Holiday',
            'MondayFinishOne' => 'bail|required_unless:MondayRoleOne,Off,Sick,Holiday',
            'MondayRoleOne' => 'required',
            'MondayStartTwo' => 'bail|required_unless:MondayRoleTwo,Off,Sick,Holiday',
            'MondayFinishTwo' => 'bail|required_unless:MondayRoleTwo,Off,Sick,Holiday',
            'MondayRoleTwo' => 'required',
            'MondayStartOne' => 'bail|required_unless:MondayRoleOne,Off,Sick,Holiday',
            'MondayFinishOne' => 'bail|required_unless:MondayRoleOne,Off,Sick,Holiday',
            'MondayRoleOne' => 'required',
            'MondayStartTwo' => 'bail|required_unless:MondayRoleTwo,Off,Sick,Holiday',
            'MondayFinishTwo' => 'bail|required_unless:MondayRoleTwo,Off,Sick,Holiday',
            'MondayRoleTwo' => 'required',
            'TuesdayStartOne' => 'bail|required_unless:TuesdayRoleOne,Off,Sick,Holiday',
            'TuesdayFinishOne' => 'bail|required_unless:TuesdayRoleOne,Off,Sick,Holiday',
            'TuesdayRoleOne' => 'required',
            'TuesdayStartTwo' => 'bail|required_unless:TuesdayRoleTwo,Off,Sick,Holiday',
            'TuesdayFinishTwo' => 'bail|required_unless:TuesdayRoleTwo,Off,Sick,Holiday',
            'TuesdayRoleTwo' => 'required',
            'WednesdayStartOne' => 'bail|required_unless:WednesdayRoleOne,Off,Sick,Holiday',
            'WednesdayFinishOne' => 'bail|required_unless:WednesdayRoleOne,Off,Sick,Holiday',
            'WednesdayRoleOne' => 'required',
            'WednesdayStartTwo' => 'bail|required_unless:WednesdayRoleTwo,Off,Sick,Holiday',
            'WednesdayFinishTwo' => 'bail|required_unless:WednesdayRoleTwo,Off,Sick,Holiday',
            'WednesdayRoleTwo' => 'required',
            'ThursdayStartOne' => 'bail|required_unless:ThursdayRoleOne,Off,Sick,Holiday',
            'ThursdayFinishOne' => 'bail|required_unless:ThursdayRoleOne,Off,Sick,Holiday',
            'ThursdayRoleOne' => 'required',
            'ThursdayStartTwo' => 'bail|required_unless:ThursdayRoleTwo,Off,Sick,Holiday',
            'ThursdayFinishTwo' => 'bail|required_unless:ThursdayRoleTwo,Off,Sick,Holiday',
            'ThursdayRoleTwo' => 'required',
            'FridayStartOne' => 'bail|required_unless:FridayRoleOne,Off,Sick,Holiday',
            'FridayFinishOne' => 'bail|required_unless:FridayRoleOne,Off,Sick,Holiday',
            'FridayRoleOne' => 'required',
            'FridayStartTwo' => 'bail|required_unless:FridayRoleTwo,Off,Sick,Holiday',
            'FridayFinishTwo' => 'bail|required_unless:FridayRoleTwo,Off,Sick,Holiday',
            'FridayRoleTwo' => 'required',
            'SaturdayStartOne' => 'bail|required_unless:SaturdayRoleOne,Off,Sick,Holiday',
            'SaturdayFinishOne' => 'bail|required_unless:SaturdayRoleOne,Off,Sick,Holiday',
            'SaturdayRoleOne' => 'required',
            'SaturdayStartTwo' => 'bail|required_unless:SaturdayRoleTwo,Off,Sick,Holiday',
            'SaturdayFinishTwo' => 'bail|required_unless:SaturdayRoleTwo,Off,Sick,Holiday',
            'SaturdayRoleTwo' => 'required',
            'SundayStartOne' => 'bail|required_unless:SundayRoleOne,Off,Sick,Holiday',
            'SundayFinishOne' => 'bail|required_unless:SundayRoleOne,Off,Sick,Holiday',
            'SundayRoleOne' => 'required',
            'SundayStartTwo' => 'bail|required_unless:SundayRoleTwo,Off,Sick,Holiday',
            'SundayFinishTwo' => 'bail|required_unless:SundayRoleTwo,Off,Sick,Holiday',
            'SundayRoleTwo' => 'required',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        //dd($validator);
        $input = [
            'Staff_Id' => $request->input('staffid'),
            'WeekCommencing' => $request->input('WeekCommencing'),
            'Hotel' => $request->input('hotel'),
            'SickDays' => $request->input('sickDays'),
            'HolidayDays' => $request->input('holidays'),
        ];
        $th = 0;
            foreach ($days as $day) {
                $input[$day . 'StartOne'] = $request->input($day .'StartOne');
                $input[$day . 'FinishOne'] = $request->input($day .'FinishOne');
                $input[$day . 'RoleOne'] = $request->input($day .'RoleOne');
                $input[$day . 'StartTwo'] = $request->input($day .'StartTwo');
                $input[$day . 'FinishTwo'] = $request->input($day .'FinishTwo');
                $input[$day . 'RoleTwo'] = $request->input($day .'RoleTwo');
                $input[$day . 'HoursOne'] = is_null($request->input($day .'FinishOne'))&&is_null($request->input($day .'StartOne'))?0:Carbon::parse($request->input($day .'FinishOne'))->floatDiffInHours(Carbon::parse($request->input($day .'StartOne')));
                $input[$day . 'HoursTwo'] = is_null($request->input($day .'FinishTwo'))&&is_null($request->input($day .'StartTwo'))?0:Carbon::parse($request->input($day .'FinishTwo'))->floatDiffInHours(Carbon::parse($request->input($day .'StartTwo')));
                $th = $th + (floatval($input[$day . 'HoursOne']) + floatval($input[$day . 'HoursTwo']));
            }

            $input['TotalHours'] = $th;
            $input['JsHours'] = 0;

        //dd($input['TotalHours']);
        $newId = Rota::create($input)->id;
        $request->session()->flash('message', 'Rota was Created... ');
        $request->session()->flash('text-class', 'text-success');
        //return redirect()->route('admin.hotels.shard.rota');
        return back();
    }
}
