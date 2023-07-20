<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Buku;
use App\Models\KategoriBuku;

class AdminBukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategori = KategoriBuku::all();
        return view('admin.buku', compact("kategori"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required',
            'kategori' => 'required',
            'deskripsi' => 'required',
            'jumlah' => 'required|numeric',
            'file_buku' => 'required|mimes:pdf',
            'cover_buku' => 'required|image|mimes:jpeg,jpg,png',
        ]);

        // Handle File Uploads
        $fileBuku = $request->file('file_buku');
        $fileBukuName = time() . '.' . $fileBuku->getClientOriginalExtension();
        $fileBuku->move(public_path('uploads/buku'), $fileBukuName);

        $coverBuku = $request->file('cover_buku');
        $coverBukuName = time() . '.' . $coverBuku->getClientOriginalExtension();
        $coverBuku->move(public_path('uploads/cover'), $coverBukuName);

        // Create Buku
        $buku = Buku::create([
            'judul' => $validatedData['judul'],
            'kategori_id' => $validatedData['kategori'],
            'pengguna_id' => auth()->id(),
            'deskripsi' => $validatedData['deskripsi'],
            'jumlah' => $validatedData['jumlah'],
            'file_path' => $fileBukuName,
            'cover_image_path' => $coverBukuName,
        ]);

        Alert::success('Sukses', 'Buku berhasil ditambahkan');

        return redirect()->route('buku.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
