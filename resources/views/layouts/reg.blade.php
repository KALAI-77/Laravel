@extends('layouts.app')
@section('title','Reg')
@section('content')

<form action="{{route('login.register')}}" method="post" class="form was-validated mt-4 p-2" novalidate>
@csrf    

<h2 class="text-center">Register Form</h2>
    <div class="form-group has-validation">
        <label for="name" >Name</label>
        <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name" placeholder="Enter Your name" value="{{ old('name') }}" required>

   
        <div class="invalid-feedback text-danger">
            <strong>@error('name'){{$message}}@enderror</strong>
        </div>
        
    </div>
    <div class="form-group has-validation">
        <label for="email" >Email</label>
        <input type="email" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" id="email" placeholder="Enter Your email" value="{{ old('email') }}" required>

        @if($errors->has('email'))
        <div class="invlid-feedback text-danger">
            <strong>{{$errors->first('email')}}</strong>
        </div>
        @endif
    </div>
    <div class="form-group has-validation">
        <label for="password" >Password</label>
        <input type="password" name="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" id="password" placeholder="Enter Your password" required>

        @if($errors->has('password'))
        <div class="invlid-feedback text-danger">
            <strong>{{$errors->first('password')}}</strong>
        </div>
        @endif
    </div>
    <button type="submit" class="btn btn-primary mt-2 d-wrap mx-auto">Register</button>
</form>

@endsection