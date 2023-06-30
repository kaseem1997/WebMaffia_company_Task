@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-4">User Details</h1>
        <table class="table table-bordered custom-table">
            <tr>
                <th class="custom-header">Name</th>
                <td>{{ $user->name }}</td>
            </tr>
            <tr>
                <th class="custom-header">Email</th>
                <td>{{ $user->email }}</td>
            </tr>
            <tr>
                <th class="custom-header">Mobile</th>
                <td>{{ $user->phone_number }}</td>
            </tr>
            <tr>
                <th class="custom-header">DOB</th>
                <td>{{ $user->dob }}</td>
            </tr>
            <tr>
                <th class="custom-header">State Name</th>
                <td>{{ $user->state }}</td>
            </tr>
        </table>
    </div>
@endsection

<style>
    .my-4 {
        margin-top: 4rem;
        margin-bottom: 4rem;
    }

    .custom-table {
        border: 2px solid #ccc;
    }

    .custom-header {
        background-color: #f0f0f0;
        font-weight: bold;
    }
</style>
