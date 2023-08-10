@extends('layout')

@section('content')
<div class="container-sm justify-content-center">
    <h3>Register</h3>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="/register">
        {{ csrf_field() }}
        <div class="container-sm justify-content-center">
            <div class="mb-3">
                <label for="email"  class="col-md-2 col-form-label">Email</label>
                <div class="col-md-4">
                    <input type="email" class="form-control" name="email" id="email"  >        
                </div>
            </div>
            <div class="mb-3">
                <label for="name" class="col-md-2 col-form-label">Username</label>
                <div class="col-md-4">
                <input type="text" class="form-control" name="username" id="username"  >
                </div>
            </div>
            <div class="mb-3">
                <label for="password" class="col-md-2 col-form-label">Password</label>
                <div class="col-md-4">
                    <input type="password" class="form-control" name="password" id="password">
                </div>
            <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@endsection 
