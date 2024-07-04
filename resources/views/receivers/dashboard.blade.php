<!-- resources/views/dashboard/welcome.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Welcome, {{ $user->name }}</div>

                <div class="card-body">
                    <p>You are logged in as {{ $user->type }}.</p>

                    <form method="POST" action="{{ route('logout') }}" >
                        @csrf
                        <button type="submit" class="btn btn-primary">Logout</button>
                    </form>
                    <!-- <div><a href="">abc</a></div> -->
                </div>
                <div class="card-body"><a href="{{ route('bloodsamples') }}" class="btn btn-info btn-lg">View Blood Availablity</a></div>
            </div>
        </div>
    </div>
</div>
@endsection

