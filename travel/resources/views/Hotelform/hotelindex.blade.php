@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Hotel's</h1>
@stop

@section('content')

    <table class="table table-striped table-dark">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">phone</th>
            <th scope="col">City_Name</th>
            <th scope="col">Update</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($hotels as $hotel)
            <tr>
                <th scope="row">{{ $hotel->id }}</th>
                <td>{{ $hotel->name }}</td>
                <td>{{ $hotel->phone }}</td>
                <td>{{ $hotel->city->name}}</td>
                <td><a href="Hotel/edit/{{ $hotel->id }}">edit</a></td>
                <td><a href="Hotel/delete/{{ $hotel->id }}">delete</a></td>
            </tr>

        @endforeach
       



        </tbody>
    </table>

    <center><button><a href="{{route('hotel.create')}}">ADD</a> </button></center>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
