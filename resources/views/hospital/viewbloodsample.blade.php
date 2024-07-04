@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Blood Sample Records</div>

                    <div class="card-body">
                        @if ($bloodSamples->isEmpty())
                            <p>No blood samples found.</p>
                        @else
                        
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Hospital Name</th>
                                        <th>Blood Type</th>
                                        <th>Quantity</th>
                                        <th>Details</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                               
                                <tbody>
                                    @foreach ($bloodSamples as $bloodSample)
                                        <tr>
                                            <td>{{ $bloodSample->id }}</td>
                                            <td>{{ $bloodSample->hospital->name }}</td>
                                            <td>{{ $bloodSample->blood_type }}</td>
                                            <td>{{ $bloodSample->quantity }}</td>
                                            <td>{{ $bloodSample->detail }}</td>
                                            <td>{{ $bloodSample->created_at }}</td>
                                            <td>
                                                @if (Auth::check())
                                                    @if (Auth::user()->user_type == 'receiver' && Auth::user()->blood_type == $bloodSample->blood_type)
                                                        <form action="{{ route('request.sample', $bloodSample->id) }}" method="POST">
                                                            @csrf
                                                            <button type="submit" class="btn btn-primary">Request Sample</button>
                                                        </form>
                                                    @else
                                                        <p>Not eligible to request this sample.</p>
                                                    @endif
                                                @else
                                                    <a href="{{ route('login') }}" class="btn btn-primary">Login to request</a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

