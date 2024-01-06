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
        Schema::create('users', function (Blueprint $table) {

            // Baris ini menambahkan kolom 'id' sebagai primary key, yang biasanya digunakan sebagai identifikasi unik untuk setiap record dalam tabel.
            $table->id(); 
            // Kolom ini digunakan untuk menyimpan nama pengguna.
            $table->string('name'); 
            // Kolom ini digunakan untuk menyimpan alamat email pengguna, dengan pengecualian bahwa setiap alamat email harus unik (unique).
            $table->string('email')->unique(); 
            // Kolom ini digunakan untuk menyimpan timestamp verifikasi email. Kolom ini boleh kosong (nullable) jika email belum diverifikasi.
            $table->timestamp('email_verified_at')->nullable(); 
            // Kolom ini digunakan untuk menyimpan password pengguna.
            $table->string('password'); 
            // Kolom ini digunakan untuk mengingat token login pengguna.
            $table->rememberToken(); 
            // Kolom ini digunakan untuk menyimpan kunci luar (foreign key) yang terhubung dengan tim saat ini. Nilai boleh kosong (nullable) jika pengguna tidak terhubung ke tim apa pun.
            $table->foreignId('current_team_id')->nullable(); 
            // Kolom ini digunakan untuk menyimpan path foto profil pengguna dengan batasan panjang 2048 karakter. Kolom ini boleh kosong (nullable).
            $table->string('profile_photo_path', 2048)->nullable(); 
            // Kolom ini digunakan untuk menyimpan kunci luar (foreign key) yang terhubung dengan tabel 'roles'. Jika peran (role) yang terkait dihapus, maka record yang terkait dalam tabel ini akan dihapus secara otomatis (cascade on delete).
            $table->foreignId('role_id')->constrained('roles')->cascadeOnDelete(); 
            // Baris ini menambahkan kolom timestamp otomatis, yaitu 'created_at' dan 'updated_at', yang digunakan untuk melacak kapan record dibuat dan terakhir diubah.
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
