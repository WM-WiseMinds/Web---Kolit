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
        Schema::create('faq', function (Blueprint $table) {
            // Kolom 'id' digunakan sebagai primary key (kunci utama) untuk memberikan identifikasi unik kepada setiap item pertanyaan dalam tabel.
            $table->id();
            // Kolom 'penanya_id' digunakan sebagai kunci luar (foreign key) yang terhubung dengan tabel 'users'.
            $table->foreignId('penanya_id')->nullable()->constrained('users')->onDelete('cascade');
            // Kolom 'penjawab_id' digunakan sebagai kunci luar (foreign key) yang terhubung dengan tabel 'users'.
            $table->foreignId('penjawab_id')->nullable()->constrained('users')->onDelete('cascade');
            // Kolom 'pertanyaan' digunakan untuk menyimpan teks pertanyaan dalam bentuk teks (text).
            $table->text('pertanyaan');
            // Kolom 'jawaban' digunakan untuk menyimpan teks jawaban dalam bentuk teks (text).
            $table->text('jawaban');
            // Kolom 'timestamps' otomatis mencakup dua timestamp datetime, yaitu 'created_at' dan 'updated_at', untuk melacak waktu pembuatan dan pembaruan pertanyaan.
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('faqs');
    }
};
