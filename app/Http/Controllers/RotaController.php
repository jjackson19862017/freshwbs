<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;
use App\Libraries\General;
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

    public function createrota(){
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

        $data['staffMember'] = Staff::whereStatus('Employed')->get();
        $data['mondayRoleOne'] = General::getEnumValues('rotas','MondayRoleOne') ;
        $data['mondayRoleTwo'] = General::getEnumValues('rotas','MondayRoleTwo') ;
        $data['tuesdayRoleOne'] = General::getEnumValues('rotas','TuesdayRoleOne') ;
        $data['tuesdayRoleTwo'] = General::getEnumValues('rotas','TuesdayRoleTwo') ;
        $data['wednesdayRoleOne'] = General::getEnumValues('rotas','WednesdayRoleOne') ;
        $data['wednesdayRoleTwo'] = General::getEnumValues('rotas','WednesdayRoleTwo') ;
        $data['thursdayRoleOne'] = General::getEnumValues('rotas','ThursdayRoleOne') ;
        $data['thursdayRoleTwo'] = General::getEnumValues('rotas','ThursdayRoleTwo') ;
        $data['fridayRoleOne'] = General::getEnumValues('rotas','FridayRoleOne') ;
        $data['fridayRoleTwo'] = General::getEnumValues('rotas','FridayRoleTwo') ;
        $data['saturdayRoleOne'] = General::getEnumValues('rotas','SaturdayRoleOne') ;
        $data['saturdayRoleTwo'] = General::getEnumValues('rotas','SaturdayRoleTwo') ;
        $data['sundayRoleOne'] = General::getEnumValues('rotas','SundayRoleOne') ;
        $data['sundayRoleTwo'] = General::getEnumValues('rotas','SundayRoleTwo') ;




            return view('admin.hotels.createrota',$data);
        }
}
