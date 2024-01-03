@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Admin's</h1>
@stop

@section('content')

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">email</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($admins as $admin)
            <tr>
                <td>{{ $admin->id }}</td>
                <td>{{ $admin->name }}</td>
                <td>{{ $admin->email }}</td>
                <td><a href="Admin/edit/{{ $admin->id }}">edit</a></td>
                <td><a href="Admin/delete/{{ $admin->id }}">delete</a></td>
            </tr>
        @endforeach


        </tbody>
    </table>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
