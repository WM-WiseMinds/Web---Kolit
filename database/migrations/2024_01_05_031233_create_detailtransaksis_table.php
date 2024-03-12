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
        Schema::create('detail_transaksi', function (Blueprint $table) {
            // Kolom 'id' digunakan sebagai primary key (kunci utama) untuk memberikan identifikasi unik kepada setiap item dalam tabel.
            $table->id();
            // Kolom 'transaksi_id' adalah kunci luar (foreign key) yang terhubung dengan tabel 'transaksi'.
            $table->foreignId('transaksi_id')->constrained('transaksi')->onDelete('cascade');
            // Kolom untuk nama barang pada detail transaksi.
            $table->string('nama_barang');
            // Kolom untuk jumlah barang pada detail transaksi.
            $table->integer('jumlah');
            // Kolom untuk ukuran barang pada detail transaksi.
            $table->string('ukuran');
            // Kolom untuk harga barang pada detail transaksi.
            $table->integer('harga');
            // Kolom 'timestamps' otomatis mencakup dua timestamp datetime, yaitu 'created_at' dan 'updated_at', untuk melacak waktu pembuatan dan pembaruan item.
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_transaksi');
    }
};
