<?php

namespace App\Http\Controllers;

use App\CallLog;
use App\Customer;
use App\Phone;
use App\Address;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class CalllogController extends Controller
{
   /**
   * Display a listing of the users
   *
   * @param  \App\CallLog  $model
   * @return \Illuminate\View\View
   */
   public function index($callbacks = 0)
   {

      $logs = CallLog::query();

      if($callbacks == 1)
      {
         $logs = $logs->where('date_of_interest', '=', today()->toDateString());
      }

      if (Gate::denies('isAdmin')) {
         $logs = $logs->where('company_id','=',Auth::user()->company_id);
      }

      $logs = $logs->orderBy('id', 'desc')->paginate(10);
      
      return view('calllogs.index', ['logs' => $logs]);
   }
   public function create() 
   {
      return view('calllogs.create');
   }
   public function store(Request $request)
   {
      $user                             = Auth::user();
      $address                          = new Address;
      $address->line1                   = $request->line1;
      $address->line2                   = $request->line2;
      $address->town                    = $request->town;
      $address->district                = $request->district;
      $address->save();
      $phone                            = new Phone;
      $phone->number                    = $request->phone;
      $phone->type                      = $request->phoneType;
      $phone->is_primary                = 1;
      $phone->save();
      $customer                         = new Customer;
      $customer->firstname              = $request->fname;
      $customer->lastname               = $request->lname;
      $customer->full_name              = $request->fname . ' ' . $request->lname;
      $customer->email                  = $request->email;
      if(isset($request->dob) && !empty($request->dob))
      {
         $customer->dob                = \convert_str_to_date('m/d/Y', $request->dob)->format('Y-m-d');
      }
      $customer->is_lead                = 1;
      $customer->address_id             = $address->id;
      $customer->phone_id               = $phone->id;
      $customer->created_by             = $user->id;
      $customer->company_id             = $user->company_id;
      $customer->save();
      $callLog                          = new CallLog;
      $callLog->interested              = $request->interest;
      if(isset($request->interestdate) && !empty($request->interestdate))
      {
         $callLog->date_of_interest    = \convert_str_to_date('m/d/Y', $request->interestdate)->format('Y-m-d');
      }
      
      $callLog->notes                   = $request->notes;
      $callLog->address_id              = $address->id;
      $callLog->phone_id                = $phone->id;
      $callLog->created_by              = $user->id;
      $callLog->customer_id             = $customer->id;
      $callLog->company_id              = $user->company_id;
      $callLog->save();
      return redirect()->route('calllog.index');
   }
   public function edit()
   {
   }
   public function update()
   {
   }
}
