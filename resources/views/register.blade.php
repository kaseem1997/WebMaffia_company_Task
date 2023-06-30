@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Register</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('register') }}" method="POST" class="row g-3">
        @csrf

        <div class="col-md-6">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
        </div>

        <div class="col-md-6">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
        </div>

        <div class="col-md-6">
            <label for="phone_number" class="form-label">Phone Number</label>
            <input type="tel" name="phone_number" id="phone_number" class="form-control" value="{{ old('phone_number') }}" required>
        </div>

        <div class="col-md-6">
            <label for="state" class="form-label">State</label>
            <input type="text" name="state" id="state" class="form-control" value="{{ old('state') }}" required>
        </div>

        <div class="col-md-6">
            <label for="dob" class="form-label">Date of Birth</label>
            <input type="date" name="dob" id="dob" class="form-control" value="{{ old('dob') }}" required>
        </div>

        <div class="col-md-6">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>

        <div class="col-md-6">
            <label for="password_confirmation" class="form-label">Confirm Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-primary">Register</button>
        </div>
    </form>
    <div class="text-center">
        <p>Already have an account? <a href="{{ route('login') }}">Login</a></p>
    </div>
</div>
@endsection