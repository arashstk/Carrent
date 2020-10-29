@extends('main')

@section('title', "Histories")

@section('content')


<div class="card">
    <div class="card-header"> 
       Histories        
    </div>
    <div class="card-body">

        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <td>Registration Number</td>
                    <td>Person Number</td>
                    <td>Check Out Time</td>
                    <td>Check In Time</td>
                    <td>Days</td>
                    <td>Cost</td>
                </tr>
            </thead>

            <tbody>
                
                @foreach($histories as $history) 
                    <tr>
                        <td>{{ App\Models\Car::find($history->car_id)->registration }}</td>
                        <td>{{ $history->person_number }}</td>
                        <td>{{ $history->check_out_time }}</td>
                        <td>{{ $history->check_in_time }}</td>
                        <td>{{ $history->days }}</td>
                        <td>{{ $history->cost }}</td>                                                
                    </tr>
                @endforeach 

            </tbody>
        </table>
        
    </div>
    
    <div class="card-header"><a class="nav-link" href="{{ url('/') }}">Main Menue</a></div>
    </div>

@endsection

