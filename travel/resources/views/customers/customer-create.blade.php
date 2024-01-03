@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Customers</h1>
@stop

@section('content')
<form method="POST" action={{ Route('store') }}>
    @csrf
    <div class="form-group row">
        <label for="inputName3" class="col-sm-2 col-form-label">Name</label>
        <div class="col-sm-10">
          <input type="text" name='name' class="form-control" id="inputName3" placeholder="Name">
        </div>
      </div>
    <div class="form-group row">
      <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
      <div class="col-sm-10">
        <input type="email" name='email' class="form-control" id="inputEmail3" placeholder="Email">
      </div>
    </div>
    <div class="form-group row">
        <label for="inputGender3" class="col-sm-2 col-form-label">Gender</label>
        <div class="col-sm-10">
          <input type="gender" name='gender' class="form-control" id="inputGender3" placeholder="enter 'f' for female or 'M' for male">
        </div>
      </div>
      <div class="form-group row">
        <label for="inputGender3" class="col-sm-2 col-form-label">Phone</label>
        <div class="col-sm-10">
          <input type="phone" name='phone' class="form-control" id="inputGender3" placeholder="enter a phone number in the format: XXX-XXX-XXXX.">
        </div>
      </div>
    <div class="form-group row">
      <div class="col-sm-10">
        <button type="submit" name='submit' class="btn btn-primary">Sign in</button>
      </div>
    </div>
  </form>

@stop
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
