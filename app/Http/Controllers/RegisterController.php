<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create() {
        return view('register.create');
    }

    public function store() {
        $attributes = request()->validate([
            'name' => ['required', 'max:255'],
            //'username' => ['required', 'min:3', 'max:255', 'unique:users,username'], // unique:users,username means that the username must be unique in the users table, in the username column
            'email' => ['required', 'email', 'max:255', 'unique:users,email'], // unique:users,email means that the email must be unique in the users table, in the email column
            'password' => ['required', 'min:7', 'max:255'],
        ]);

        $user = User::create($attributes);

        auth()->login($user);

        return redirect('/')->with('success', 'Your account has been created.');
    }
}
