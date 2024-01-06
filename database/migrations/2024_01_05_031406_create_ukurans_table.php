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
        Schema::create('ukuran', function (Blueprint $table) {
            // Kolom 'id' digunakan sebagai primary key (kunci utama) untuk memberikan identifikasi unik kepada setiap barang dalam tabel.
            $table->id();
            // Kolom 'barang_id' adalah kunci luar (foreign key) yang terhubung dengan tabel 'barang'.
            $table->foreignId('barang_id')->constrained('barang');
            // Kolom 'ukuran' digunakan untuk menyimpan ukuran barang dengan panjang maksimum 50 karakter.
            $table->string('ukuran', 50);
            // Kolom 'stock' digunakan untuk menyimpan jumlah stok barang dalam bentuk angka bulat.
            $table->integer('stock');
            // Kolom 'harga' digunakan untuk menyimpan harga barang dalam bentuk angka bulat.
            $table->integer('harga');
            // Kolom 'deskripsi' digunakan untuk menyimpan deskripsi lebih lanjut mengenai barang dalam bentuk teks.
            $table->text('deskripsi');
            // Kolom 'timestamps' otomatis mencakup dua timestamp datetime, yaitu 'created_at' dan 'updated_at', untuk melacak waktu pembuatan dan pembaruan barang.
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ukurans');
    }
};
