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

    public function filter($kategori)
    {
        $user = Auth::user();
        $total_user = User::count();
        $total_buku = $user->buku->count();
        $total_kategori = KategoriBuku::count();

        // Cek apakah parameter kategori memiliki nilai atau tidak
        if ($kategori == 'all') {
            // Ambil semua buku yang diupload oleh user tertentu
            $buku = Buku::where('pengguna_id', $user->id)->get();
        } else {
            // Ambil buku berdasarkan kategori yang dipilih dan diupload oleh user tertentu
            $buku = Buku::where('pengguna_id', $user->id)
                ->whereHas('category', function ($query) use ($kategori) {
                    $query->where('id', $kategori);
                })
                ->get();
        }

        // Ambil data kategori untuk dropdown filter
        $kategori = KategoriBuku::all();

        // Kembalikan view buku dengan data buku dan kategori
        return view('user.dashboard', compact('buku', 'kategori', 'total_kategori', 'total_buku', 'total_user'));
    }
}
