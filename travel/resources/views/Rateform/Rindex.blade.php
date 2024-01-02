


@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Rating's</h1>
@stop

@section('content')

    <table class="table table-striped table-dark">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Star</th>
            <th scope="col">Comment</th>
            <th scope="col">Customer_Name</th>
            <th scope="col">Hotel_Name</th>
            <th scope="col">Update</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>
        <tbody>
            
        @foreach($rate as $rate)
        
            <tr>
                <th scope="row">{{ $rate->id }}</th>
                <td>{{ $rate->star }}</td>
                <td>{{ $rate->comment }}</td>
                <td>{{ $rate->customer->name}}</td>
                <td>{{ $rate->hotel->name }}</td>
                <td><a href="Rate/edit/{{ $rate->id }}">edit</a></td>
                <td><a href="Rate/destroy/{{ $rate->id }}">delete</a></td>
            </tr>

        @endforeach


        </tbody>
    </table>
    <center>  <button><a href="{{ route('Rate.add')}}">Add </a></button> </center>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
