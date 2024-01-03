@extends('adminlte::page')

@section('title', 'Update user')

@section('content_header')
<h1>user's</h1>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form method="POST" action={{ Route('update',['id'=>$User->id]) }}>
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputPassword1">name</label>
                        <input type="text" name='name' value="{{ $User->name }}" class="form-control" id="exampleInputname" placeholder="name">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">email</label>
                        <input type="email" name='email' class="form-control" value="{{ $User->email }}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
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
