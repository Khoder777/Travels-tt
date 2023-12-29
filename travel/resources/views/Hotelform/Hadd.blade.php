@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Hotel's ADD</h1>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form method="POST" action="{{route('hotel.store')}}">
                    @csrf
                    <div class="form-group">
                        <label for="hotelName">Name</label>
                        <input type="text" class="form-control"  id="hotelName" aria-describedby="hotelName" placeholder="Enter Hotel Name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="phoneNumber">Phone</label>
                        <input type="text"  class="form-control" id="phoneNumber" placeholder=" Enter Phone Number" name="phone">
                    </div>
                    <div class="form-group"> 
                    <select class="form-select" multiple aria-label="multiple select example" name="city_id">
                        <option display selected>City_id</option>
                        @foreach($city as $city)
                        <option value='{{$city->id}}'>{{$city->name}}</option>
                        @endforeach
                        </select>
                    
                    </div> 
                    
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>

            </div>
        </div>
    </div>



@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script> console.log('Hi!'); </script>
@stop
