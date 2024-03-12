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
        Schema::create('barang', function (Blueprint $table) {
            // Kolom id digunakan sebagai primary key (kunci utama) yang memberikan identifikasi unik untuk setiap barang dalam tabel.
            $table->id();
            // Kolom 'nama_barang' digunakan untuk menyimpan nama barang dengan panjang maksimum 255 karakter.
            $table->string('nama_barang', 255);
            // Kolom 'keterangan' digunakan untuk menyimpan keterangan atau deskripsi lebih lanjut mengenai barang dalam bentuk teks.
            $table->text('keterangan');
            // Kolom 'gambar' digunakan untuk menyimpan nama file gambar dengan panjang maksimum 255 karakter.
            $table->string('gambar', 255);
            // Kolom 'status' digunakan untuk menyimpan status barang dengan enum
            $table->enum('status', ['Aktif', 'Tidak Aktif']);
            // Kolom 'timestamps' otomatis mencakup dua timestamp, yaitu 'created_at' dan 'updated_at', untuk melacak waktu pembuatan dan pembaruan record.
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang');
    }
};
