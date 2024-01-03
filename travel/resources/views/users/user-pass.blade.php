
@extends('adminlte::page')

@section('title', 'Update Admin password')

@section('content_header')
<h1><i class="fas fa-user-shield"></i>change Admins password</h1>@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form method="POST" action={{ Route('update-pass',['id'=>Auth::id()]) }}>
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputPassword1">old password</label>
                        <input type="password" name='password' class="form-control" id="exampleInputname" placeholder="enter old password">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">new password</label>
                        <input type="password" name='newpassword' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter new password">
                    </div>
                   
                    <div class="form-group">
                        <label for="exampleInputEmail1">confirm password</label>
                        <input type="password" name='confirmpassword' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter confirm new password">
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
