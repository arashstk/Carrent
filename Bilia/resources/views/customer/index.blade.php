@extends('main')

@section('title', "Customers")

@section('content')


<div class="card">
    <div class="card-header">
        <a class="btn-sm btn-info float-right" href="{{ url('add_customer') }}">Add Customer</a>

        <h2>Customers list</h2>
        
    </div>
    <div class="card-body">

        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <td>Person Number</td>
                    <td>Name</td>
                    <td>Address</td>
                    <td>Postal Address</td>
                    <td>Phone Number</td>
                    <td>Action</td>
                </tr>
            </thead>

            <tbody>

                @foreach($customers as $customer) 
                    <tr>
                        <td>{{ $customer->person_number }}</td>
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->address }}</td>
                        <td>{{ $customer->postal_address }}</td>
                        <td>{{ $customer->phone_number }}</td>
                        <td>
                            <a href="{{('customer/edit/'. $customer->person_number)}}" class="btn btn-primary btn-sm">Edit</a>
                            
                                
                                
                            @if(App\Models\History::where('person_number', $customer->person_number) 
                                ->where('check_in_time', null)
                                ->count() == 0)                                 
                                    <a href="{{('customer/remove/'. $customer->person_number)}}" class="btn btn-danger btn-sm">Remove</a>
                            @endif
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        
    </div>
    
    <div class="card-header"><a class="nav-link" href="{{  url('/') }}">Main Menue</a></div>
    </div>

@endsection

