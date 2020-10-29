@extends('main')

@section('title', "check in")

@section('content')

<div class="card">
    <div class="card-header">Check in</div>
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

                            
                        

            <input type="submit" value="Check in"  class="btn btn-success">
        </form>
        
    </div>
</div>

@endsection

