@extends('layouts.app')

@section('title', 'Call Logs')

@section('content')
@include('layouts.headers.nocards')

<div class="container-fluid mt-4">
    <div class="row justify-content-center">
        <div class="col-6">
            <form method="POST" action="{{ route('calllog.store') }}">
                @csrf
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Create Call Log</h3>
                            </div>
                            <!-- <div class="col-4 text-right">
                                <a href="{{ route('calllog.create') }}" class="btn btn-sm btn-primary">Add Call Log</a>
                            </div> -->
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="fname">First Name</label>
                            <input type="text" class="form-control" name="fname" id="fname" placeholder="First Name">
                        </div>
                        <div class="form-group">
                            <label for="lname">Last Name</label>
                            <input type="text" class="form-control" name="lname" id="lname" placeholder="Last Name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label for="dob">Date of Birth</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                </div>
                                <input class="form-control datepicker" placeholder="Select date" type="text" value="" id="dob" name="dob">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="line1">Address Line 1</label>
                            <input type="text" class="form-control" name="line1" id="line1" placeholder="Address Line 1">
                        </div>
                        <div class="form-group">
                            <label for="line2">Address Line 2</label>
                            <input type="text" class="form-control" name="line2" id="line2" placeholder="Address Line 2">
                        </div>
                        <div class="form-group">
                            <label for="town">City/Town/Village</label>
                            <input type="text" class="form-control" name="town" id="town" placeholder="Town">
                        </div>
                        <div class="form-group">
                            <label for="district">District</label>
                            <select class="form-control" id="district" name="district">
                                <option value="Belize">Belize</option>
                                <option value="Cayo">Cayo</option>
                                <option value="Corozal">Corozal</option>
                                <option value="Orange Walk">Orange Walk</option>
                                <option value="Stan Creek">Stan Creek</option>
                                <option value="Punta Gorda">Punta Gorda</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="tel" class="form-control" name="phone" id="phone" placeholder="699-8689" pattern="[0-9]{3}-[0-9]{4}">
                        </div>
                        <div class="form-group">
                            <label for="phoneType">Phone Type</label>
                            <select class="form-control" id="phoneType" name="phoneType">
                                <option value="Home">Home</option>
                                <option value="Mobile">Mobile</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="radios">Interested </label>
                            <div id="radios">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="interest1" name="interest" class="custom-control-input" value="1"> 
                                    <label class="custom-control-label" for="interest1">Yes</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="interest2" name="interest" class="custom-control-input" value="0"> 
                                    <label class="custom-control-label" for="interest2">No</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="interestdate">Date of Interest</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                </div>
                                <input class="form-control datepicker" placeholder="Select date" type="text" value="" id="interestdate" name="interestdate">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="notes">Notes</label>
                            <textarea class="form-control" id="notes" name="notes" rows="3"></textarea>
                        </div>

                        <input class="btn btn-primary" type="submit" value="Submit">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@include('layouts.footers.auth')

@endsection