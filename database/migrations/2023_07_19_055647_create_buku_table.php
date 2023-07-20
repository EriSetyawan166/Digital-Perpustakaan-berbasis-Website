<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('buku', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->text('deskripsi');
            $table->integer('jumlah');
            $table->string('file_path')->nullable();
            $table->string('cover_image_path')->nullable();
            $table->foreignId('kategori_id')->constrained('kategori_buku')->onDelete('cascade');;
            $table->foreignId('pengguna_id')->constrained('users')->onDelete('cascade');;
            $table->timestamps();   
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buku');
    }
};
