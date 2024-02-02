<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function create() {
        return view('logIn.create');
    }

    public function store() {
        $attributes = request()->validate([
            'email'     => ['required', 'email', 'max:255'],
            'password'  => ['required', 'min:7', 'max:255'],
        ]);

        if (auth()->attempt($attributes)) {
            session()->regenerate();

            return redirect('/')->with('success', 'Welcome Back!');
        }

        return back()->withErrors(['email' => 'Your provided credentials could not be verified.']);
    }

    public function destroy() {
        auth()->logout();

        return redirect('/')->with('success', 'Goodbye!');
    }
}
