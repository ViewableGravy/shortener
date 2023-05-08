<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rule;

class AuthenticationController extends Controller
{
    public function registrationForm()
    {
        return view('register');
    }

    public function loginForm()
    {
        return view('login');
    }

    public function register()
    {
        //validate fields
        $fields = request()->validate([
            'email' => [ 'required', 'email', Rule::unique('User', 'email') ],
            'first_name' => ['required', 'max:255'],
            'last_name' => ['required', 'max:255'],
            'password' => [ 'required', 'confirmed', 'min:8' ]
        ]);

        // create user | (password is hashed using a mutator)
        User::create($fields);

        //Sign the user in
        // auth()->attempt($fields);

        //show registration message (flash)
        session()->flash('success', [
            'title' => 'Registration Successful',
            'message' => 'Thanks for registering! You are now logged in.'
        ]);

        //redirect to dhasboard (home for now)
        return redirect('/');
    }
}
