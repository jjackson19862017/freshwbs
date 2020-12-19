<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function about()
    {
        return view('about.about');
    }

    public function experience()
    {
        return view('about.experience');
    }

    public function interests()
    {
        return view('about.interests');
    }

    public function piprojects()
    {
        return view('about.piprojects');
    }

    public function applications()
    {
        return view('about.applications');
    }

    public function education()
    {
        return view('about.education');
    }
}
