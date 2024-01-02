@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>City's</h1>
@stop

@section('content')

    <table class="table table-striped table-dark">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Country</th>
            <th scope="col">update</th>
            <th scope="col">delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $city)
            <tr>
                <th scope="row">{{ $city->id }}</th>
                <td>{{ $city->name }}</td>
                <td>{{ $city->country }}</td>
                <td><a href="city/edit/{{ $city->id }}">edit</a></td>
                <td><a href="city/delete/{{ $city->id }}">delete</a></td>
            </tr>

        @endforeach


        </tbody>
    </table>

    <center><button><a href="{{route('City.create')}}">ADD</a> </button></center>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
