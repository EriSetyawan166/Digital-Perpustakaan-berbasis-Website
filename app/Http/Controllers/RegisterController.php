<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required',
        ]);

        // return redirect()->back()
        //     ->withErrors(['password' => 'The password confirmation does not match.'])
        //     ->withInput();

        $user = User::create([
            'nama' => $validatedData['nama'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        // Perform any additional actions after registration

        // Redirect the user to the desired page
        return redirect()->route('login')->with('toast_success', 'Registrasi Berhasil!')->withInput();
    }
}
