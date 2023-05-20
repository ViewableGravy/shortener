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
            'email'      => [ 'required', 'email', Rule::unique('users', 'email') ],
            'first_name' => [ 'required', 'max:255'],
            'last_name'  => [ 'required', 'max:255'],
            'password'   => [ 'required', 'confirmed', 'min:8' ]
        ]);

        // create user | (password is hashed using a mutator)
        $user = User::create($fields);

        //Sign the user in
        auth()->login($user);

        //show registration message (flash)
        session()->flash('success', [
            'title' => 'Registration Successful',
            'message' => 'Thanks for registering! You are now logged in.'
        ]);

        //redirect to dhasboard (home for now)
        return redirect('/');
    }

    public function logout()
    {
        auth()->logout();

        return redirect('/');
    }

    public function login() {
        //validate fields
        $fields = request()->validate([
            'email'      => [ 'required', 'email' ],
            'password'   => [ 'required' ]
        ]);

        //attempt to log the user in
        if (auth()->attempt($fields)) {
            //redirect to dashboard
            return redirect('/')->with('success', [
                'title' => 'Login Successful',
                'message' => 'You are now logged in.'
            ]);
        }

        //redirect to login form
        return back()->withErrors([
            'email' => 'Your provided credentials could not be verified.'
        ]);
    }
}
