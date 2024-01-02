@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Company's</h1>
@stop

@section('content')
    <example-component><table class="table">
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">id</th>
            <th scope="col">Name</th>
            <th scope="col">Phone</th>
            <th scope="col">Edit</th>
            <th scope="col">Delate</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($company as $company)
          <tr>
            <th scope="row">{{$company->id}}</th>
            <td>{{$company->name}}</td>
            <td>{{$company->phone}}</td>
            <td><a href="{{ route('company.edit', $company->id)}}">edit</a></td>
            <td><a href="{{ route('company.destroy', $company->id)}}">delate</a></td>
          </tr>
          @endforeach
        </tbody>
        <a href="{{ route('company.add')}}">Add Company</a>
      </table>
    </example-component>
    @stop

    @section('css')
        <link rel="stylesheet" href="/css/admin_custom.css">
    @stop
    
    @section('js')
        <script> console.log('Hi!'); </script>
    @stop

