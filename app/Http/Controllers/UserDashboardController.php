<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\KategoriBuku;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
    public function index()
{
    $kategori = KategoriBuku::all();
    $user = Auth::user();

    $buku = $user->buku;
    
    $total_buku = $user->buku->count();
    $level = session()->get("role");
    if ($level == 'admin') {
        return redirect()->intended('admin\dashboard');
    }

    $data = [
        'title' => 'User Dashboard',
        'message' => 'Selamat datang di dashboard user!'
    ];

    return view('user.dashboard', $data, compact('total_buku', 'buku', 'kategori'));
}
}
