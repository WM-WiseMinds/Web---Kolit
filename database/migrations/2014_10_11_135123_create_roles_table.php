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
        Schema::create('role', function (Blueprint $table) {
            //line di bawah menambahkan kolom 'id' sebagai primary key, yang biasanya digunakan sebagai identifikasi unik untuk setiap record dalam tabel.
            $table->id();
            //atribut name untuk menyimpan nama (role).
            $table->string('name');
            //menambahkan kolom timestamp otomatis, yaitu 'created_at' dan 'updated_at', yang digunakan untuk melacak kapan record dibuat dan terakhir diubah.
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};
