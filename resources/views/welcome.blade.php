@extends('layouts.app')

@section('content')
<div class="jumbotron">
    <div class="container">
        <h1>Welcome to {{ config('app.name', 'Our Blood Bank System') }}</h1>
        
        <p>
            <a href="{{ route('register') }}" class="btn btn-primary btn-lg">Register</a>
            <!-- <a href="" class="btn btn-secondary btn-lg">Register as Receiver</a> -->
        </p>
        <p>
            <a href=" {{ route('login.as.hospital') }} " class="btn btn-success btn-lg">Login as Hospital</a>
            <a href="{{ route('logindashboard') }}" class="btn btn-info btn-lg">Login as Receiver</a>
        </p>
        <div><a href="{{ route('bloodsamples') }}" class="btn btn-info btn-lg">View Blood Availablity</a></div>
    </div>
</div>
@endsection
