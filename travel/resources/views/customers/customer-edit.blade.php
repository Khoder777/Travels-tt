@extends('adminlte::page')

@section('title', 'Update Customer')

@section('content_header')
<h1>Customer's</h1>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form method="POST" action={{ Route('update',['id'=>$customer->id]) }}>
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputPassword1">name</label>
                        <input type="text" name='name' value="{{ $customer->name }}" class="form-control" id="exampleInputname" placeholder="name">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">email</label>
                        <input type="email" name='email' class="form-control" value="{{ $customer->email }}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                   
                    <div class="form-group">
                        <label for="exampleInputEmail1">gender</label>
                        <input type="gender" name='gender' class="form-control" value="{{ $customer->gender }}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter gender">
                   
                    </div><div class="form-group">
                        <label for="exampleInputEmail1">phone</label>
                        <input type="phone" name='phone' class="form-control" value="{{ $customer->phone }}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter phone">
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">

                    </div>
                    <button type="submit" class="btn btn-primary">save</button>
                </form>

            </div>
        </div>
    </div>



@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script> console.log('Hi!'); </script>
@stop
