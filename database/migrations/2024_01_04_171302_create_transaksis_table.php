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
            $table->foreignId('user_id')->constrained('user')->onDelete('cascade');
            // Kolom untuk menyimpan kode transaksi dengan panjang maksimum 100 karakter.
            $table->string('kode_transaksi', 100);
            // Kolom untuk menyimpan total harga transaksi (angka bulat).
            $table->integer('total_harga');
            // Kolom untuk menyimpan total jumlah pembelian (angka bulat).
            $table->integer('total_pembelian');
            // Kolom untuk menyimpan nama pelanggan dengan panjang maksimum 255 karakter.
            $table->string('nama_pelanggan', 255);
            // Kolom untuk menyimpan nomor WhatsApp pelanggan dengan panjang maksimum 15 karakter.
            $table->string('no_wa_pelanggan', 15);
            // Kolom untuk menyimpan alamat pelanggan.
            $table->string('alamat_pelanggan');
            // Kolom untuk menyimpan tipe pembayaran dengan panjang maksimum 50 karakter.
            $table->string('tipe_pembayaran', 50);
            // Kolom untuk menyimpan status transaksi dengan panjang maksimum 50 karakter.
            $table->string('status', 50);
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
