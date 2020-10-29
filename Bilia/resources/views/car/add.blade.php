@extends('main')

@section('title', "add car")

@section('content')

<div class="card">
    <div class="card-header">Add car</div>
    <div class="card-body">

        <form method="post">
            @csrf

            <div class="form-group">
                <label for="registration">Registration</label>
                <input required type="text" class="form-control" id="registration" name="registration">
            </div>

            
            <div class="form-group">
                <label for="year">Year</label>
                <input required type="text" value="{{ old('year') }}" class="form-control" id="year" name="year">
            </div>

            <div class="form-group">
                <label for="price">Price</label>
                <input required type="number" value="{{ old('price') }}" class="form-control" id="price" name="price">
            </div>

            <!-- we comeback here again -->
            <div class="form-group">
                <label for="color">Color</label>
                <select name="color" id="color" class="form-control">
                    <option value="0">--select a color--</option>
                @foreach(App\Models\Color::all() as $color)
                <option value="{{ $color->id }}">{{ $color->title }}</option>
                @endforeach
                <!-- <option value="1">Red</option>
                <option value="2">Blue</option>
                <option value="3">Green</option> -->
                </select>
                
            </div>

            <!-- we comeback here again -->
            <div class="form-group">
                <label for="make">Make</label>
                <select name="make" id="make" class="form-control">
                    <option value="0">--select a make--</option>
                    @foreach(App\Models\Make::all() as $make)
                        <option value="{{$make->id}}">{{$make->title}}</option>
                    @endforeach
                <!--<option value="1">Red</option>
                <option value="2">Blue</option>
                <option value="3">Green</option>-->  
                </select>
                
            </div>

                                 

            <input type="submit" value="Add" class="btn btn-success">
        </form>
        
    </div>
</div>

@endsection

