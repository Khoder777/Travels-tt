@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Ticket's</h1>
@stop

@section('content')

    <table class="table table-striped table-dark">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">City_Name</th>
            <th scope="col">Company_Name</th>
            <th scope="col">Date Start</th>
            <th scope="col">Date End</th>
            <th scope="col">Update</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $ticket)
            <tr>
                <th scope="row">{{ $ticket->id }}</th>
                <td>{{ $ticket->city->name }}</td>
                <td>{{ $ticket->company->name }}</td>
                <td>{{ $ticket->date_s}}</td>
                <td>{{ $ticket->date_e}}</td>
                <td><a href="Ticket/edit/{{ $ticket->id }}">edit</a></td>
                <td><a href="Ticket/delete/{{ $ticket->id }}">delete</a></td>
            </tr>

        @endforeach


        </tbody>
    </table>

    <center><button><a href="{{route('ticket.create')}}">ADD</a> </button></center>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
