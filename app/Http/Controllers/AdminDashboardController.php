<?php

namespace App\Http\Controllers;

use App\Models\KategoriBuku;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $total_kategori = KategoriBuku::count();
        $level = session()->get("role");
        if($level == 'user') {
            return redirect()->intended('user\dashboard');
        }
        
        $data = [
            'title' => 'Admin Dashboard',
            'message' => 'Selamat datang di dashboard admin!'
        ];

        return view('admin.dashboard', $data, compact('total_kategori'));
    }
}
