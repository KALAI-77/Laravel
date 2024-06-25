@extends('layouts.app')
@section('content')
@section('title','welcome')
<h1 class="text-center text-primary">Welcome</h1>
<table class="table table-bordered text-center">
    <thead class="font-weight-bold">

        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($request as $roll)
        <tr>
        <td>{{$roll->name}}</td>
        <td>{{$roll->email}}</td>
        <td><a href="{{ route('logout') }}">Logout</a>
        </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection('content')