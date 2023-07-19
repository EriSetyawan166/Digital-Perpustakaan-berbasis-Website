<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    public function index()
    {
        $level = session()->get("role");
        if($level == 'admin') {
            return redirect()->intended('admin\dashboard');
        }

        $data = [
            'title' => 'Admin Dashboard',
            'message' => 'Selamat datang di dashboard admin!'
        ];

        return view('user.dashboard', $data);
    }
}
