@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Hotel's UPDATE</h1>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form method="post" action="{{ route( 'ticket.update',['id'=> $tickets->id]) }}">
                    @csrf
                    <div class="form-group"> 
                    <select class="form-select" multiple aria-label="multiple select example" name="city_id">
                        <option display selected>City_id</option>
                        @foreach($city as $city)
                        <option value='{{$city->id}}'>{{$city->name}}</option>
                        @endforeach
                        </select>
                    
                    </div> 
                    <div class="form-group"> 
                    <select class="form-select" aria-label=".form-select-lg example" name="company_id">
                        <option display selected>Company_id</option>
                        @foreach($company as $company)
                        <option value='{{$company->id}}'>{{$company->name}}</option>
                        @endforeach
                        </select>
                    
                    </div> 

                    <div class="form-group">
                        <label for="date_s">Date Start</label>
                        <input type="text" class="form-control" value="{{ $tickets->date_s }}"  id="date_s" aria-describedby="date_s" placeholder="Enter Date Start" name="date_s">
                    </div>
                    <div class="form-group">
                        <label for="date_e">Date End</label>
                        <input type="text"  class="form-control" value="{{ $tickets->date_e }}" id="date_e" placeholder=" Enter Date End" name="date_e">
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
