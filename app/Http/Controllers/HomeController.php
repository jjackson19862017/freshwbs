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
        // Allows only logged in users to see the frontend pages.
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Shows the home page
        return view('home');
    }

    public function about()
    {
        // Shows the about page
        return view('about.about');
    }

    public function experience()
    {
        // Shows the experience page
        return view('about.experience');
    }

    public function interests()
    {
        // Shows the interests page
        return view('about.interests');
    }

    public function piprojects()
    {
        // Shows the Pi Projects page
        return view('about.piprojects');
    }

    public function applications()
    {
        // Shows the Applications page
        return view('about.applications');
    }

    public function education()
    {
        // Shows the Education page
        return view('about.education');
    }
}
