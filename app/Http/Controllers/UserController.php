<?php

namespace App\Http\Controllers;

use App\User;
use App\Company;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\User  $model
     * @return \Illuminate\View\View
     */
    public function index()
    {
        if(Gate::allows('isAdmin'))
        {
            $users = User::All();
        }
        else 
        {
            $users = User::where('company_id', Auth::user()->company_id)->get();
        }
        
        
        return view('users.index', ['users' => $users]);
    }

    public function create()
    {
        $companies =  Company::All();

        return view('users.create',['companies' => $companies]);
    }

    public function store(Request $request)
    {
        $userValidator = $this->validator($request->all());

        $user                   = new User;
        $user->name             = $request->name;
        $user->email            = $request->email;
        $user->password         = Hash::make($request->password);
        $user->active           = 1;
        $user->role             = $request->role;
        if(isset($request->company) && !empty($request->company))
        {
            $user->company_id   = $request->company;
        }
        else 
        {
            $user->company_id   = Auth::user()->company_id;
        }
        $user->save();

        return redirect()->route('user.index');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'company' => ['required'],
            'role' => ['required'],
        ]);
    }
}
