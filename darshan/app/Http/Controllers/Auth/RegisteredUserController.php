<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;

class RegisteredUserController extends Controller
{
    /**
     * Show Register Page
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle Register
     */
    public function store(RegisterRequest $request)
    {
        User::create(
            $request->safe()->only(['name', 'email', 'phone', 'city', 'password'])
        );

        return redirect()->route('login')
            ->with('success', 'Registration Successful');
    }
}