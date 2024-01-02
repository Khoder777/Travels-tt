

@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')
    <h1>Booking's</h1>
@stop

@section('content')

<example-component>
  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">date</th>
        <th scope="col">ticket_id</th>
        <th scope="col">hotel_id</th>
        <th scope="col">customer_id</th>
        <th scope="col">Edit</th>
        <th scope="col">Delate</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($booking as $booking)
      <tr>
        <th scope="row">{{$booking->date}}</th>
        <td>{{$booking->ticket->date_e}}{{"---"}} {{$booking->ticket->date_s}}</td>
        <td>{{$booking->hotel->name}}</td>
        <td>{{$booking->customer->name}}</td>
        <td><a href="{{ route('booking.edit', $booking->id)}}">edit</a></td>
        <td><a href="{{ route('booking.destroy', $booking->id)}}">delate</a></td>
      </tr>
      @endforeach
    </tbody>
    
  </table>
</example-component>

    <center><button><a href="{{route('booking.add')}}">ADD</a> </button></center>
</form>





@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">

@stop

@section('js')
<script> console.log('Hi!');</script>
  
  
@stop