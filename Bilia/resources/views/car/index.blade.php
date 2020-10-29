@extends('main')

@section('title', "cars")

@section('content')



<div class="card">
    <div class="card-header">
        
        <a class="btn-sm btn-info float-right" href="{{ url('add_car') }}">Add Car</a>
        <h2>Cars list</h2>

    </div>
    <div class="card-body">

        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <td>Registratin</td>
                    <td>Year</td>
                    <td>Price</td>
                    <td>Color</td>
                    <td>Make</td>                                       
                    <td>Checked out by</td>
                    <td>Checked out time</td>
                    <td>Action</td>
                </tr>
            </thead>

            <tbody>
           
                @foreach($car as $car) 
                    <tr>
                        <td>{{ $car->registration}}</td>
                        <td>{{ $car->year}}</td>
                        <td>{{ number_format($car->price) }}</td>
                        <td>{{ \App\Models\Color::find($car->color_id)->title }}</td>
                        <td>{{ \App\Models\Make::find($car->make_id)->title }}</td>                  
                        <td>{{ $car->check_out_by == null ? "Free" : App\Models\Customer::find($car->check_out_by)->person_number }}</td>
                        <td>{{ $car->check_out_time }}</td>
                        <td>
                            <a href="{{ url('car/edit/'. $car->id)}}" class="btn btn-primary btn-sm">Edit</a>
                            @if($car->check_out_by == null)    
                                <a 
                                href="{{url('car/remove/'. $car->id)}}" 
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Are you sure to delet the car?')"
                                >Remove</a>
                            @endif

                            
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        
    </div>
    
    <div class="card-header"><a class="nav-link" href="{{ url('/') }}">Main Menue</a></div>
    </div>

@endsection

