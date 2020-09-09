@extends('layouts.app')

@section('title', 'Companies')

@section('content')
@include('layouts.headers.nocards')
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Companies</h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('company.create') }}" class="btn btn-sm btn-primary">Add Company</a>
                        </div>
                    </div>
                </div>
                
                <div class="col-12">
                
                </div>

                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Company Name</th>
                                <th scope="col">Number of Seats</th>
                                <th scope="col">Subscription Start</th>
                                <th scope="col">Subscription End</th>
                                <th scope="col">Active</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($companies as $company)
                                <tr>
                                    <td>{{ $company->name }}</td>
                                    <td>{{ $company->num_of_seats }}</td>
                                    <td>{{ $company->subscription_start }}</td>
                                    <td>{{ $company->subscription_end }}</td>
                                    <td>
                                        @if($company->active === 1)
                                            Active
                                        @else
                                            Inactive
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer py-4">
                    <nav class="d-flex justify-content-end" aria-label="...">
                        
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts.footers.auth')

@endsection