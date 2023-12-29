

















@extends('adminlte::page')

@section('title', 'Dashboard')

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
  <form method="post" action={{ route('booking.update' , $booking->id )}}>
    @csrf
    <div class="form-group"  >
      <label for="">date</label>
      <input type="date" class="form-control"  placeholder="Enter City Name" name='date' value="{{$booking->date}}">
    </div>
    <div class="form-group">
      <label for="">ticket_id</label>
      <input type="text" class="form-control" id="" placeholder="Enter Phone Name" name='hotel_id' value="{{$booking->hotel_id}}" >
    </div>
    <div class="form-group">
      <label for="">hotel_id</label>
      <input type="text" class="form-control" id="" placeholder="Enter Phone Name" name='ticket_id' value="{{$booking->hotel->name}}" >
    </div>
    <div class="form-group">
      <label for="">customer_id</label>
      <input type="text" class="form-control" id="" placeholder="Enter Phone Name" name='customer_id' value="{{$booking->customer->name}}" >
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