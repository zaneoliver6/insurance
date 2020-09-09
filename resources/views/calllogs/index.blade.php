@extends('layouts.app')

@section('title', 'Call Logs')

@section('content')
@include('layouts.headers.nocards')
<div class="container-fluid mt-4">
   <div class="row">
      <div class="col">
         <div class="card shadow">
            <div class="card-header border-0">
               <div class="row align-items-center">
                  <div class="col-8">
                     <h3 class="mb-0">Call Logs</h3>
                  </div>
                  <div class="col-4 text-right">
                     <a href="{{ route('calllog.create') }}" class="btn btn-sm btn-primary">Add Call Log</a>
                  </div>
               </div>
            </div>
            
            <div class="col-12">
            
            </div>
            <div class="table-responsive">
               <table class="table align-items-center table-flush">
                  <thead class="thead-light">
                     <tr>
                        <th scope="col">Call Date</th>
                        <th scope="col">Customer Name</th>
                        <th scope="col">Customer Address</th>
                        <th scope="col">Customer Phone</th>
                        <th scope="col">Interested</th>
                        <th scope="col">Date of Interest</th>
                        <th scope="col">Notes</th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach($logs as $log)
                        <tr>
                           <td>{{ $log->created_at }}</td>
                           <td>{{ $log->customer->full_name }}</td>
                           <td>
                              <address>
                                 {{ $log->address->line1 }} <br>
                                 @if(isset($log->address->line2))
                                    {{ $log->address->line2 }} <br>
                                 @endif
                                 {{ $log->address->district }} <br>
                                 {{ $log->address->town }}
                              </address>
                           </td>
                           <td>{{ $log->phone->number }}</td>
                           <td> {{ $log->interested == 1 ? 'Yes':'No' }} </td>
                           <td> {{ $log->date_of_interest }} </td>
                           <td>
                              @php
                                 echo wordwrap($log->notes, 40, '<br/>', false);
                              @endphp 
                           </td>
                        </tr>
                     @endforeach
                  </tbody>
               </table>
               {{ $logs->links() }}
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