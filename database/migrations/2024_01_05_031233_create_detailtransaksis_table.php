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
        Schema::create('detail transaksi', function (Blueprint $table) {
        // Kolom 'id' digunakan sebagai primary key (kunci utama) untuk memberikan identifikasi unik kepada setiap item dalam tabel.
        $table->id();
        // Kolom 'transaksi_id' adalah kunci luar (foreign key) yang terhubung dengan tabel 'transaksi'.
        $table->foreignId('transaksi_id')->constrained('transaksi');
        // Kolom 'jumlah' digunakan untuk menyimpan jumlah item yang dibeli dalam bentuk angka bulat.
        $table->integer('jumlah');
        // Kolom 'harga_barang' digunakan untuk menyimpan harga satu item barang dalam bentuk angka bulat.
        $table->integer('harga_barang');
        // Kolom 'ukuran' digunakan untuk menyimpan ukuran barang dengan panjang maksimum 100 karakter.
        $table->string('ukuran', 100);
        // Kolom 'nama_barang' digunakan untuk menyimpan nama barang dengan panjang maksimum 255 karakter.
        $table->string('nama_barang', 255);
        // Kolom 'total' digunakan untuk menyimpan total harga untuk item tertentu dalam bentuk angka bulat.
        $table->integer('total');
        // Kolom 'foto_barang' digunakan untuk menyimpan nama file foto barang dengan panjang maksimum 255 karakter.
        $table->string('foto_barang', 255);
        // Kolom 'timestamps' otomatis mencakup dua timestamp datetime, yaitu 'created_at' dan 'updated_at', untuk melacak waktu pembuatan dan pembaruan item.
        $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detailtransaksis');
    }
};
