<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginCreateRequest;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class LoginController extends Controller
{
    public function create() {
        return Inertia::render('Auth/Login');
    }

    public function store(LoginCreateRequest $request) {
        $validated = $request->validated();

        if (Auth::attempt($validated)) {
            $request->session()->regenerate();
            return redirect()->route('plans.index');
        }

        return back()->withErrors([
            'email' => '認証に失敗しました',
        ]);
    }

    public function destroy(LoginCreateRequest $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login.create');
    }
}
