<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        $companies =  Company::All();

        return view('company.index',['companies' => $companies]);
    }

    public function create() 
   {
        return view('company.create');
   }

   public function store(Request $request)
   {
       $company                         = new Company;
       $company->name                   = $request->cname;
       $company->num_of_seats           = $request->seats;
       $company->active                 = 1;
       if($request->substart != '')
       {
           $company->subscription_start = \convert_str_to_date('m/d/Y', $request->substart)->format('Y-m-d');
       }

       if($request->subend != '')
       {
           $company->subscription_end   = \convert_str_to_date('m/d/Y', $request->subend)->format('Y-m-d');
       }

       $company->save();

       return redirect()->route('company.index');
   }

   public function update()
   {
       
   }

}
