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
        Schema::create('keranjang', function (Blueprint $table) {
            // Kolom 'id' digunakan sebagai primary key (kunci utama) untuk memberikan identifikasi unik kepada setiap record dalam tabel.
            $table->id();
            // Kolom 'user_id' adalah kunci luar (foreign key) yang terhubung dengan tabel 'user' dan mengaktifkan opsi 'cascade' pada saat penghapusan.
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            // Kolom 'barang_id' adalah kunci luar (foreign key) yang terhubung dengan tabel 'barang' dan mengaktifkan opsi 'cascade' pada saat penghapusan.
            $table->foreignId('barang_id')->constrained('barang')->onDelete('cascade');
            // Kolom 'ukuran_id' adalah kunci luar (foreign key) yang terhubung dengan tabel 'ukuran' dan mengaktifkan opsi 'cascade' pada saat penghapusan.
            $table->foreignId('ukuran_id')->nullable()->constrained('ukuran')->onDelete('cascade');
            // Kolom 'ukuran_custom_id' adalah kunci luar (foreign key) yang terhubung dengan tabel 'ukuran_custom' dan mengaktifkan opsi 'cascade' pada saat penghapusan.
            $table->foreignId('ukuran_custom_id')->nullable()->constrained('ukuran_custom')->onDelete('cascade');
            // Kolom 'tipe_ukuran' digunakan untuk menyimpan tipe ukuran yang dipilih
            $table->enum('tipe_ukuran', ['standar', 'custom']);
            // Kolom 'jumlah' digunakan untuk menyimpan jumlah barang dalam bentuk angka bulat.
            $table->integer('jumlah');
            // Kolom 'timestamps' otomatis mencakup dua timestamp datetime, yaitu 'created_at' dan 'updated_at', untuk melacak waktu pembuatan dan pembaruan record.
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keranjang');
    }
};
