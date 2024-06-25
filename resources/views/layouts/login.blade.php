@extends('layouts.app')
@section('title', 'Login')
@section('content')
@if(session()->has('success'))
        <div class="alert alert-success text-center">
            {{ session()->get('success') }}
        </div>
@endif 
@if(session()->has('error'))
    <div class="alert alert-danger  text-center">
        {{ session()->get('error') }}
    </div>
@endif 

@if(session()->has('fail'))
    <div class="alert alert-danger  text-center">
        {{ session()->get('fail') }}
    </div>
@endif 
<form action="{{ route('login.verify') }}" method="post" class="form was-validated" >
    @csrf
    <h2 class="text-center">Login Form</h2>
 
    <div class="form-group">
        <label for="email" class="control-label">Email</label>
        <input type="email" name="email" value="{{old('email')}}" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" id="email" placeholder="Enter Your email" required>
        @if($errors->has('email'))
            <div class="invalid-feedback text-danger">
                <strong>{{ $errors->first('email') }}</strong>
            </div>
        @endif
    </div>

    <div class="form-group">
        <label for="password" class="control-label">Password</label>
        <input type="password" name="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" id="password" placeholder="Enter Your password" required>
        @if($errors->has('password'))
            <div class="invalid-feedback text-danger">
                <strong>{{ $errors->first('password') }}</strong>
            </div>
        @endif
    </div>

    <button type="submit" class="btn btn-primary">Login</button>
</form>

@endsection
