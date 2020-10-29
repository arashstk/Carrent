@extends('main')

@section('title', "check out")

@section('content')

<div class="card">
    <div class="card-header">Check out</div>
    <div class="card-body">

        <form method="post">
            @csrf

            <div class="form-group">
                <label for="car">Car</label>
                <select required name="car" id="car" class="form-control">
                    @foreach($cars as $car)
                        <option value="{{$car->id}}">
                        {{ $car->registration }}  
                        {{ App\Models\Color::find($car->color_id)->title}}
                        {{ App\Models\Make::find($car->make_id)->title}}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="person_number">Customer</label>
                <select required name="person_number" id="person_number" class="form-control">
                    @foreach($customers as $customer)
                        <option value="{{ $customer->person_number }}"> {{$customer->name}} ({{$customer->person_number}})</option>
                    @endforeach
                </select>
            </div>                      
                        

            <input type="submit" value="Check out" href="{{ url('/') }}" class="btn btn-success">
        </form>
        
    </div>
</div>

@endsection

