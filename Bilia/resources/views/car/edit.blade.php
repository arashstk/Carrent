@extends('main')

@section('title', "dit car")

@section('content')

<div class="card">
    <div class="card-header">Edit car</div>
    <div class="card-body">

        <form method="post">
            @csrf

            <div class="form-group">
                <label for="registration">Registration</label>
                <input disabled type="text" disabled value= "{{ $car->registration}}" class="form-control" id="registration" name="registration" >
            </div>

            
            <div class="form-group">
                <label for="year">Year</label>
                <input required type="text" value= "{{ $car->year}}" class="form-control" id="year" name="year">
            </div>

            <div class="form-group">
                <label for="price">Price</label>
                <input required type="text" value= "{{ $car->price}}" class="form-control" id="price" name="price">
            </div>

            
            <div class="form-group">
                <label for="color">Color</label>
                <select name="color" id="color" class="form-control">
                @foreach(App\Models\Color::all() as $color)
                    <option @if($color->id == $car->color_id) selected @endif value="{{ $color->id }}">{{ $color->title }}</option>
                @endforeach
                <!-- <option value="1">Red</option>
                <option value="2">Blue</option>
                <option value="3">Green</option> -->
                </select>
                
            </div>

            <div class="form-group">
                <label for="make">Make</label>
                <select name="make" id="make" class="form-control">
                @foreach(App\Models\Make::all() as $make)
                    <option @if($make->id == $make->make_id) selected @endif value="{{ $make->id }}">{{ $make ->title }}</option>
                @endforeach
                </select>                
            </div>

            
            

            <input type="submit" value="Update" class="btn btn-success">
        </form>
        
    </div>
</div>

@endsection


