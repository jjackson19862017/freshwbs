<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;

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





            return view('admin.hotels.createrota',$data);
        }
}
