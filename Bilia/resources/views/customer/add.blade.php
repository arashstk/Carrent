@extends('main')

@section('title', "add customer")

@section('content')

<div class="card">
    <div class="card-header">Add customer</div>
    <div class="card-body">

        <form method="post">
            @csrf

            <div class="form-group">
                <label for="person_number">Person_number</label>
                <input required type="text" value="{{ old('person_number') }}" class="form-control" id="person_number" name="person_number">
            </div>

            
            <div class="form-group">
                <label for="name">Name</label>
                <input required type="text" value="{{ old('name') }}" class="form-control" id="name" name="name">
            </div>

            <div class="form-group">
                <label for="address">Address</label>
                <input required type="text" value="{{ old('address') }}" class="form-control" id="address" name="address">
            </div>

            
            
            <div class="form-group">
                <label for="postal_address">Postal_address</label>
                <input required type="text" value="{{ old('postal_address') }}" class="form-control" id="postal_address" name="postal_address">
            </div>

            <div class="form-group">
                <label for="phone_number">Phone_number</label>
                <input required type="text" value="{{ old('phone_number') }}" class="form-control" id="phone_number" name="phone_number">
            </div>
            

            <input type="submit" value="Add" class="btn btn-success">
        </form>
        
    </div>
</div>

@endsection

