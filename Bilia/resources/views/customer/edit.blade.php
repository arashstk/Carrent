@extends('main')

@section('title', "dit customer")

@section('content')

<div class="card">
    <div class="card-header">Edit customer</div>
    <div class="card-body">

        <form method="post">
            @csrf

            <div class="form-group">
                <label for="person_number">person_number</label>
                <input required type="text" disabled value= "{{ $customers->person_number}}" class="form-control" id="person_number" name="person_number" >
            </div>

            
            <div class="form-group">
                <label for="name">name</label>
                <input required type="text" value= "{{ $customers->name}}" class="form-control" id="name" name="name">
            </div>

            <div class="form-group">
                <label for="address">Address</label>
                <input required type="text" value= "{{ $customers->address}}" class="form-control" id="address" name="address">
            </div>

            
            
            <div class="form-group">
                <label for="postal_address">postal_address</label>
                <input required type="text" value= "{{ $customers->postal_address}}" class="form-control" id="postal_address" name="postal_address">
            </div>

            <div class="form-group">
                <label for="phone_number">phone_number</label>
                <input required type="text" value= "{{ $customers->phone_number}}" class="form-control" id="phone_number" name="phone_number">
            </div>
            

            <input type="submit" value="Update" class="btn btn-success">
        </form>
        
    </div>
</div>

@endsection


