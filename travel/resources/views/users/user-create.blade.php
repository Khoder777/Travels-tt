<!-- resources/views/admins/create.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Create Admin</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admins-store') }}" method="POST">
        @csrf
        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="{{ old('name') }}" required>

        <label for="password">Password</label>
        <input type="password" name="password" id="password" required>

        <label for="email">Email</label>
        <input type="email" name="email" id="email" value="{{ old('email') }}" required>

        <button type="submit">Create</button>
    </form>
@endsection
