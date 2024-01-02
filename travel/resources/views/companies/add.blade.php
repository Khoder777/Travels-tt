

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Company's</h1>
@stop

@section('content')
    <example-component><!DOCTYPE html>
      <html lang="en">
      <head>
        <title>Create Company </title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
      </head>
      <body>
      <div class="container mt-3">
        <h2>Company</h2>
         <form method="post" action={{ route('company.create')}}>
          @csrf
          <div class="form-group">
            <label for="exampleInputEmail1">Company Name</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Company Name" name='name'>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Company phone</label>
            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter Phone Name" name='phone'>
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

