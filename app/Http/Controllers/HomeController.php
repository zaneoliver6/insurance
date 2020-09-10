<?php

namespace App\Http\Controllers;
use App\CallLog;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $logs = CallLog::whereDate('date_of_interest', '=', today()->toDateString())->count();
        return view('home.index',['logs' => $logs]);
    }
}
