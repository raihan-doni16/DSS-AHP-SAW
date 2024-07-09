<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Password;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //

    public function show()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'name' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return view('dashboard');
        }

        return back()->withErrors([
            'name' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function create()
    {
        return view('auth.register');
    }

    public function regist()
    {
        $validatedData = request()->validate([
            'name' => 'required|max:255|min:2',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:5|max:255'
        ]);


        try {
            $user = User::create([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'password' => Hash::make($validatedData['password']),
            ]);
            auth()->login($user);

            return redirect('/');
        } catch (\Exception $e) {
            return back()->withErrors([
                'error' => 'An error occurred while creating the user.',
            ]);
        }
    }

}
