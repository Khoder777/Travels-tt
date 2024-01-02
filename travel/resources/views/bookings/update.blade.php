@extends('adminlte::page')

@section('title', 'Edit Booking')

@section('content_header')
    <h1>Booking's</h1>
@stop

@section('content')

<example-component><!DOCTYPE html>
  <!DOCTYPE html>
<html lang="en">
<head>
  <title>ُEdit Booking </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
  <h2>Booking</h2>
<form method="post" action={{ route('booking.update', $booking->id )}}>
  @csrf
  <div class="form-group">
    <label for="exampleInputEmail1">Company Name</label>
    <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter date" name='date' value="{{$booking->date}}">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Customer_id</label>
    <select class="form-select" aria-label="Default select example" name="customer_id">
      <option selected value="{{$booking->customer_id}}">{{$booking->customer->name}}</option>
     @foreach ($customer as $customer)
     <option value="{{$customer->id}}">{{$customer->name}}</option>
     @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Hotel_id</label>
    <select class="form-select" aria-label="Default select example" name="hotel_id">
      <option selected value="{{$booking->hotel_id}}">{{$booking->hotel->name}}</option>
     @foreach ($hotel as $hotel)
     <option value="{{$hotel->id}}">{{$hotel->name}}</option>
     @endforeach
     
    </select>    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Ticket_id</label>
      <select class="form-select" aria-label="Default select example" name="ticket_id">
        <option selected value="{{$booking->ticket_id}}">{{$booking->ticket->date_s}} {{$booking->ticket->date_e}}</option>
        @foreach ($ticket as $ticket)
        <option value="{{$ticket->id}}">{{$ticket->date_s}} {{$ticket->date_e}}</option>
        @endforeach
      </select>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

</div>
</body>
</html>
  
</example-component>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop