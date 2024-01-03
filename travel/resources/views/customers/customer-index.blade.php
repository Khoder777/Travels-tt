<!-- resources/views/cs/index.blade.php -->
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Customers</h1>
@stop

@section('content')
<style>
    a {
        color: white; /* Change color to desired value */
    }
    a:hover {
    color: white;
}
</style>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">email</th>
            <th scope="col">phone</th>
            <th scope="col">gender</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
            <th scope="col"><button type="button" class="btn btn-primary"><a href={{ Route('create') }}>create customer</a></button></th>
            

        </tr>
        </thead>
        <tbody>
            @foreach ($customer as $c)
            <tr>
         
                <td>{{ $c->id }}</td>
                <td>{{ $c->name }}</td>
                <td>{{ $c->email }}</td>
                <td>{{ $c->phone }}</td>
                <td>{{ $c->gender }}</td>
                <td><button type="button" class="btn btn-success"><a href={{ Route('edit',['id'=>$c->id]) }}>edit</a></button></td>
                <td><button type="button" class="btn btn-danger"><a href={{ Route('confirm',['id'=>$c->id]) }}>delete</a></button></td>

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
