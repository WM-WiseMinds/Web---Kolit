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
            $table->foreignId('barang_id')->constrained('barang')->onDelete('cascade');
            // Kolom 'ukuran' digunakan untuk menyimpan ukuran lebih lanjut mengenai barang dalam bentuk teks.
            $table->text('ukuran');
            // Kolom 'panjang' digunakan untuk menyimpan panjang ukuran barang dengan tipe data integer.
            $table->integer('panjang');
            // Kolom 'lebar' digunakan untuk menyimpan lebar ukuran barang dengan tipe data integer.
            $table->integer('lebar');
            // Kolom 'tinggi' digunakan untuk menyimpan tinggi ukuran barang dengan tipe data integer.
            $table->integer('tinggi');
            // Kolom 'stock' digunakan untuk menyimpan stok ukuran barang dengan tipe data integer.
            $table->integer('stock');
            // Kolom 'harga' digunakan untuk menyimpan harga ukuran barang dengan tipe data integer.
            $table->integer('harga');
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
