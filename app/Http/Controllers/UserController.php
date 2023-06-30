<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\CustomBrochureMail;
use App\Mail\UserApprovalMail;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // Show the user registration form

    public function create()
    {
        return view('register');
    }

    // Store a newly created user in the database
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'phone_number' => 'required',
            'state' => 'required',
            'dob' => 'required|date|before_or_equal:' . now()->subYears(20)->format('Y-m-d'),
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);
        //$validatedData['password'] = bcrypt($validatedData['password']);
        $user = User::create($validatedData);

        // Send email with custom brochure or PDF
        Mail::to($user->email)->send(new CustomBrochureMail());
        // Log in the user
        Auth::login($user);
        return redirect()->route('login')->with('success', 'Registration successful! Please log in.');
    }

    // Update the specified user in the database
    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'phone_number' => 'required',
            'state' => 'required',
            'dob' => 'required|date|before_or_equal:' . now()->subYears(20)->format('Y-m-d'),
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:6',
        ]);

        // Update the user record
        $user->update([
            'name' => $validatedData['name'],
            'phone_number' => $validatedData['phone_number'],
            'state' => $validatedData['state'],
            'dob' => $validatedData['dob'],
            'email' => $validatedData['email'],
            'password' => isset($validatedData['password']) ? Hash::make($validatedData['password']) : $user->password,
        ]);

        // Return a success response
        return response()->json(['message' => 'User updated successfully']);
    }
}
