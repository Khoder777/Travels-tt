@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Ticket's UPDATE</h1>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form method="post" action="{{ route( 'ticket.update',['id'=> $tickets->id]) }}">
                    @csrf
                    <div class="form-group"> 
                    <select class="form-select" aria-label=".form-select-lg example" name="city_id">
                        
                        @foreach($city as $city)
                        <option value='{{$city->id}}'@selected($tickets->city_id==$city->id)>{{$city->name}}</option>
                        @endforeach
                        </select>
                    
                    </div> 
                    <div class="form-group"> 
                    <select class="form-select" aria-label=".form-select-lg example" name="company_id">
                       
                        @foreach($company as $company)
                        <option value='{{$company->id}}'@selected($tickets->company_id==$company->id)>{{$company->name}}</option>
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
