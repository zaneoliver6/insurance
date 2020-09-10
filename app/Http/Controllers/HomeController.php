<?php

namespace App\Http\Controllers;
use App\CallLog;
use Illuminate\Support\Facades\Auth;

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
        $logs = CallLog::where([['date_of_interest', '=', today()->toDateString()],['company_id','=',Auth::user()->company_id],])->count();
        return view('home.index',['logs' => $logs]);
    }
}
