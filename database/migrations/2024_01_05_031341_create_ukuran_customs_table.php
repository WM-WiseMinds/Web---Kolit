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
        Schema::create('ukuran_custom', function (Blueprint $table) {
            // Kolom 'id' digunakan sebagai primary key (kunci utama) untuk memberikan identifikasi unik kepada setiap ukuran custom dalam tabel.
            $table->id();
            // Kolom 'barang_id' digunakan untuk menyimpan id barang yang terkait dengan ukuran custom.
            $table->foreignId('barang_id')->constrained('barang')->onDelete('cascade');
            // Kolom 'panjang' digunakan untuk menyimpan panjang ukuran custom dengan tipe data integer.
            $table->integer('panjang');
            // Kolom 'lebar' digunakan untuk menyimpan lebar ukuran custom dengan tipe data integer.
            $table->integer('lebar');
            // Kolom 'tinggi' digunakan untuk menyimpan tinggi ukuran custom dengan tipe data integer.
            $table->integer('tinggi');
            // Kolom 'harga' digunakan untuk menyimpan harga ukuran custom dengan tipe data integer.
            $table->integer('harga');
            // Kolom 'timestamps' otomatis mencakup dua timestamp datetime, yaitu 'created_at' dan 'updated_at
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ukuran_custom');
    }
};
