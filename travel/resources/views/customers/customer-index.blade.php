<!-- resources/views/cs/index.blade.php -->
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1><i class="fa fa-users"></i> Customers</h1>
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

<!-- Add the search form -->
<form method="GET" action="{{ route('customers-search') }}">
    <div class="input-group mb-3">
        <input type="text" class="form-control" name="name" placeholder="Search by name">
        {{-- <div class="form-group row"> --}}
            {{-- <label for="inputGender3" class="col-sm-2 col-form-label">Gender</label> --}}
              <input type="gender" name='gender' class="form-control" id="inputGender3" placeholder="enter 'f' for female or 'M' for male">
        {{-- <div class="input-group-append"> --}}
            <button class="btn btn-primary" type="submit">Search</button>
        {{-- </div> --}}
    </div>
</form>

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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
