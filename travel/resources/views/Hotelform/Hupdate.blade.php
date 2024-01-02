@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Hotel's UPDATE</h1>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form method="post" action="{{ route( 'hotel.update',['id'=> $hotels->id]) }}">
                    @csrf
                    <div class="form-group">
                        <label for="HotelName">Name</label>
                        <input type="text" class="form-control" value="{{ $hotels->name }}" id="HotelName" aria-describedby="HotelName" placeholder="Hotel Name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="phoneNumber">phone</label>
                        <input type="text" value="{{ $hotels->phone }}" class="form-control" id="phoneNumber" placeholder="phone Number" name="phone">
                    </div>
                    <div class="form-group"> 
                    <select class="form-select" aria-label=".form-select-lg example" name="city_id" >
                    <option display selected>City_id</option>
                    @foreach($city as $city)
                    <option value='{{$city->id}}' @selected($hotels->city_id==$city->id)>{{$city->name}}</option>
                    
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
