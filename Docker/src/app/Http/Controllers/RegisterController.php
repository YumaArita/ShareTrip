<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\RegisterCreateRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;

class RegisterController extends Controller
{
    public function create() {
        return Inertia::render('Auth/Register');
    }

    public function store(RegisterCreateRequest $request) {
        $validated = $request->validated();

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        Auth::login($user);

        return redirect()->route('plans.index');
    }
}
