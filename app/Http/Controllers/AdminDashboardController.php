<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $level = session()->get("role");
        if($level == 'user') {
            return redirect()->intended('user\dashboard');
        }
        
        $data = [
            'title' => 'Admin Dashboard',
            'message' => 'Selamat datang di dashboard admin!'
        ];

        return view('admin.dashboard', $data);
    }
}
