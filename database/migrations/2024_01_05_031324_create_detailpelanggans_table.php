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
        Schema::create('detailpelanggan', function (Blueprint $table) {
            // Kolom 'id' digunakan sebagai primary key (kunci utama) untuk memberikan identifikasi unik kepada setiap record dalam tabel.
            $table->id();
            // Kolom 'user_id' adalah kunci luar (foreign key) yang terhubung dengan tabel 'user'.
            $table->foreignId('user_id')->constrained('users');
            // Kolom 'no_wa' digunakan untuk menyimpan nomor WhatsApp dengan panjang maksimum 15 karakter.
            $table->string('no_wa', 50);
            // Kolom 'alamat' digunakan untuk menyimpan alamat dengan tipe data string.
            $table->string('alamat');
            // Kolom 'timestamps' otomatis mencakup dua timestamp datetime, yaitu 'created_at' dan 'updated_at', untuk melacak waktu pembuatan dan pembaruan record.
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_pelanggan');
    }
};
