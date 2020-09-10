<?php

namespace App\Http\Controllers;
use App\CallLog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

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
      $logs = CallLog::query();

      if (Gate::denies('isAdmin')) {
         $logs = $logs->where('company_id','=',Auth::user()->company_id);
      }

      $logs = $logs->where('date_of_interest', '=', today()->toDateString())->count();
      return view('home.index',['logs' => $logs]);
   }
}
