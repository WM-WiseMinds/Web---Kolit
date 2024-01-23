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
        Schema::create('portfolio', function (Blueprint $table) {
            // Kolom 'id' digunakan sebagai primary key (kunci utama) untuk memberikan identifikasi unik kepada setiap tugas akhir dalam tabel.
            $table->id();
            // Kolom 'barang_id' adalah kunci luar (foreign key) yang terhubung dengan tabel 'barang' dan mengaktifkan opsi 'cascade' pada saat penghapusan.
            $table->foreignId('barang_id')->constrained('barang')->onDelete('cascade');
            // Kolom 'judul' digunakan untuk menyimpan judul tugas akhir dengan panjang maksimum 255 karakter.
            $table->string('judul', 255);
            // Kolom 'tanggal_pengerjaan' adalah timestamp datetime yang mencatat kapan tugas akhir ini dikerjakan.
            $table->dateTime('tanggal_pengerjaan');
            // Kolom 'kategori' digunakan untuk menyimpan kategori tugas akhir dengan panjang maksimum 100 karakter.
            $table->string('kategori', 100);
            // Kolom 'timestamps' otomatis mencakup dua timestamp datetime, yaitu 'created_at' dan 'updated_at', untuk melacak waktu pembuatan dan pembaruan tugas akhir.
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('portfolios');
    }
};