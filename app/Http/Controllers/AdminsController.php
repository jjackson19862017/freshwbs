<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminsController extends Controller
{
    // This returns the Main Dashboard of the Admin Area
    public function index(){
        return view('admin.index');
    }
}
