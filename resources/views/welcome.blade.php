@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Welcome to My Application</h1>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <p>Please <a href="{{ route('login') }}">login</a> to continue.</p>
    </div>
@endsection
