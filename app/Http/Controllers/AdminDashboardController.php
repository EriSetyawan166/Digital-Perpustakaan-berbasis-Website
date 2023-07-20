<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\KategoriBuku;
use App\Models\User;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $kategori = KategoriBuku::all();
        $buku = Buku::all();
        $total_user = User::count();
        $total_buku = Buku::count();
        $total_kategori = KategoriBuku::count();
        $level = session()->get("role");
        if($level == 'user') {
            return redirect()->intended('user\dashboard');
        }
        
        $data = [
            'title' => 'Admin Dashboard',
            'message' => 'Selamat datang di dashboard admin!'
        ];

        return view('admin.dashboard', $data, compact('total_kategori', 'total_buku', 'total_user', 'buku', 'kategori'));
    }

    public function filter($kategori)
{
    // $kategori = KategoriBuku::all();
        $buku = Buku::all();
        $total_user = User::count();
        $total_buku = Buku::count();
        $total_kategori = KategoriBuku::count();
    // Cek apakah parameter kategori memiliki nilai atau tidak
    if ($kategori == 'all') {
        $buku = Buku::all();
    } else {
        // Ambil buku berdasarkan kategori yang dipilih
        $buku = Buku::whereHas('category', function ($query) use ($kategori) {
            $query->where('id', $kategori);
        })->get();
    }

    // Ambil data kategori untuk dropdown filter
    $kategori = KategoriBuku::all();

    // Kembalikan view buku dengan data buku dan kategori
    return view('admin.dashboard', compact('buku', 'kategori','total_kategori', 'total_buku', 'total_user'));
}
}
