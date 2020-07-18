<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Day;

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
        $today = Day::firstOrCreate([
            'date' => today(),
        ]);
        // $today = Day::latest()->first();

        return view('home', [
            'today' => $today,
        ]);
    }
}
