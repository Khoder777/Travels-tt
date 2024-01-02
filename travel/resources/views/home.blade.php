@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1><i class="fas fa-building"></i> Tourist Reservation Office</h1>
@stop

@section('content')
    <h2>Welcome to Tourist Reservation Office</h2>
    <h4>We are proud to be the best Office on the planet and we welcome you to our website.</h4>
    <p> Here, you can reserve tickets and explore various tourist attractions.</p>
@stop

@section('css')

    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop