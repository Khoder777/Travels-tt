@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Rating's UPDATE</h1>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form method="post" action="{{ route( 'Rate.update',['id'=> $rate->id]) }}">
                    @csrf
                    <div class="form-group">
                        <label for="star">Star</label>
                        <input type="text" class="form-control" value="{{ $rate->star }}"  id="star" aria-describedby="star" placeholder="Enter your Rating out of 5" name="star">
                    </div>
                    <div class="form-group">
                        <label for="comment">Comment</label>
                        <input type="text"  class="form-control" value="{{ $rate->comment }}" id="comment" placeholder=" Enter your Comment" name="comment">
                    </div>

                    <div class="form-group">
                    <select class="form-select" aria-label=".form-select-lg example" name="customer_id" >
                    <option display selected>Customer_id</option>
                    @foreach($customer as $customer)
                    <option value='{{$customer->id}}' @selected($rate->customer_id==$customer->id)>{{$customer->name}}</option>
                    
                        @endforeach
                        </select>
                        
                    </div>
                     
                    <div class="form-group">
                    <select class="form-select" aria-label=".form-select-lg example" name="hotel_id" >
                    <option display selected>Hotel_id</option>
                    @foreach($hotel as $hotel)
                    <option value='{{$hotel->id}}' @selected($rate->hotel_id==$hotel->id)>{{$hotel->name}}</option>
                    
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
