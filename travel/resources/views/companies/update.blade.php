



@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Company's</h1>
@stop

@section('content')
    <example-component><!DOCTYPE html>
      <html lang="en">
      <head>
        <title>ُEdit Company </title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
      </head>
      <body>
      
      <div class="container mt-3">
        <h2>Company</h2>
        <form method="post" action={{ route('company.update' , $company->id )}}>
          @csrf
          <div class="form-group"  >
            <label for="">name</label>
            <input type="text" class="form-control"  placeholder="Enter Company Name" name='name' value="{{$company->name}}">
          </div>
          <div class="form-group">
            <label for="">phone</label>
            <input type="text" class="form-control" id="" placeholder="Enter Phone Name" name='phone' value="{{$company->phone}}" >
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

