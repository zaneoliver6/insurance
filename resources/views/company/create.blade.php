@extends('layouts.app')

@section('title', 'Add a Company')

@section('content')
@include('layouts.headers.nocards')

<div class="container-fluid mt-4">
    <div class="row justify-content-center">
        <div class="col-6">
            <form method="POST" action="{{ route('company.store') }}">
                @csrf
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Add Company</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="cname">Name</label>
                            <input type="text" class="form-control" name="cname" id="cname" placeholder="Company Name">
                        </div>
                        <div class="form-group">
                            <label for="seats">Number of Seats</label>
                            <input type="number" class="form-control" name="seats" id="seats">
                        </div>
                        <div class="form-group">
                            <label for="substart">Subscription Start</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                </div>
                                <input class="form-control datepicker" placeholder="Select date" type="text" value="" id="substart" name="substart">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="subend">Subscription End</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                </div>
                                <input class="form-control datepicker" placeholder="Select date" type="text" value="" id="subend" name="subend">
                            </div>
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