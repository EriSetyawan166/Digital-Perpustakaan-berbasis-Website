<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $session = User::where('email', $request->email)->first();
            
            $request->session()->regenerate();
            session([
                'nama' => $session->username,
                'id' => $session->id,
                'role' => $session->role,
            ]);
    
            if ($session->role == 'admin') {
                return redirect()->route('admin.dashboard')->with('success', 'Selamat Datang ' . $session->nama);
            } else {
                return redirect()->route('user.dashboard')->with('success', 'Selamat Datang ' . $session->nama);
            }
        } else {
            // Authentication failed
            
            return redirect()->back()->withErrors(['login' => 'Email atau password salah.']);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('login');
    }
}
