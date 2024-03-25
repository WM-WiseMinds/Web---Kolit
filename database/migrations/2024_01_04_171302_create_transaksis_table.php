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
        Schema::create('transaksi', function (Blueprint $table) {
            // Kolom id sebagai primary key (kunci utama) yang memberikan identifikasi unik untuk setiap record dalam tabel.
            $table->id();
            // Kolom ini adalah kunci luar yang terhubung dengan tabel 'user' dengan opsi 'cascade' pada saat penghapusan.
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            // Kolom untuk menyimpan total harga transaksi (angka bulat).
            $table->integer('total_harga');
            // Kolom untuk menyimpan foto bukti pembayaran dengan panjang maksimum 255 karakter.
            $table->string('bukti_pembayaran', 255)->nullable();
            // Kolom untuk menyimpan status transaksi dengan enum.
            $table->enum('status', ['Pesanan Diproses', 'Menunggu Konfirmasi', 'Pembayaran Diterima', 'Pembayaran Ditolak', 'Pesanan Dikerjakan', 'Pesanan Selesai']);
            // Kolom timestamp otomatis untuk created_at dan updated_at.
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
