@extends('layouts.app')

@section('title', 'Create Users')

@section('content')
@include('layouts.headers.nocards')

<div class="container-fluid mt-4">
    <div class="row justify-content-center">
        <div class="col-6">
            <form method="POST" action="{{ route('user.store') }}">
                @csrf
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Create User</h3>
                            </div>
                            <!-- <div class="col-4 text-right">
                                <a href="{{ route('calllog.create') }}" class="btn btn-sm btn-primary">Add Call Log</a>
                            </div> -->
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                            <div class="input-group input-group-alternative mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                                </div>
                                <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" type="text" name="name" value="{{ old('name') }}" required autofocus>
                            </div>
                            @if ($errors->has('name'))
                                <span class="invalid-feedback" style="display: block;" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                            <div class="input-group input-group-alternative mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                </div>
                                <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" type="email" name="email" value="{{ old('email') }}" required>
                            </div>
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" style="display: block;" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                </div>
                                <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('Password') }}" type="password" name="password" required>
                            </div>
                            @if ($errors->has('password'))
                                <span class="invalid-feedback" style="display: block;" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                </div>
                                <input class="form-control" placeholder="{{ __('Confirm Password') }}" type="password" name="password_confirmation" required>
                            </div>
                        </div>
                        <!-- <div class="text-muted font-italic">
                            <small>{{ __('password strength') }}: <span class="text-success font-weight-700">{{ __('strong') }}strong</span></small>
                        </div> -->

                        @can('isAdmin')
                            <div class="form-group{{ $errors->has('copmany') ? ' has-danger' : '' }}">
                                <div class="input-group input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-building"></i></span>
                                    </div>
                                    <select class="form-control{{ $errors->has('company') ? ' is-invalid' : '' }}" placeholder="{{ __('Company') }}"  name="company" required>
                                        <option>Please Select a Company</option>
                                        @foreach($companies as $company)
                                            @if($company->id !== 1)
                                                <option value="{{ $company->id }}">{{ $company->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                @if ($errors->has('company'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('company') }}</strong>
                                    </span>
                                @endif
                            </div>
                        @endcan

                        <div class="form-group{{ $errors->has('role') ? ' has-danger' : '' }}">
                            <div class="input-group input-group-alternative mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user-shield"></i></span>
                                </div>
                                <select class="form-control{{ $errors->has('role') ? ' is-invalid' : '' }}" placeholder="{{ __('Role') }}"  name="role" required>
                                    <option>Please Select a Role</option>
                                    <option value="user">User</option>
                                    <option value="manager">Manager</option>
                                    @can('isAdmin')
                                        <option value="admin">Super Admin</option>
                                    @endcan
                                </select>
                            </div>
                            @if ($errors->has('role'))
                                <span class="invalid-feedback" style="display: block;" role="alert">
                                    <strong>{{ $errors->first('role') }}</strong>
                                </span>
                            @endif
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