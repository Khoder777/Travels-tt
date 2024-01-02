@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>City's UPDATE</h1>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form method="post" action="{{ route( 'City.update',['id'=> $city->id]) }}">
                    @csrf
                    <div class="form-group">
                        <label for="cityName">Name</label>
                        <input type="text" class="form-control" value="{{ $city->name }}" id="cityName" aria-describedby="cityName" placeholder="City Name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="countryName">Country</label>
                        <input type="text" value="{{ $city->country }}" class="form-control" id="countryname" placeholder="Country Name" name="country">
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
