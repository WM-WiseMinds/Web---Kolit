<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UkuranCustom extends Model
{
    use HasFactory;

    // Mendefinisikan nama tabel yang terkait dengan model 'UkuranCustom' menjadi 'ukuran_custom'.
    protected $table = 'ukuran_custom';

    // Mendefinisikan kolom-kolom yang dapat diisi (fillable) pada model 'UkuranCustom'.
    protected $fillable = [
        'barang_id',
        'panjang',
        'lebar',
        'tinggi',
        'harga',
    ];

    // Mendefinisikan bahwa model 'UkuranCustom' memiliki relasi "hasMany" dengan model 'Keranjang',
    // yang mengindikasikan bahwa setiap UkuranCustom hanya dimiliki oleh satu Keranjang.
    public function keranjang()
    {
        return $this->hasMany(Keranjang::class);
    }

    // Mendefinisikan bahwa model 'UkuranCustom' memiliki relasi "belongsTo" dengan model 'Barang',
    // yang mengindikasikan bahwa setiap UkuranCustom terkait dengan satu Barang.
    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
}
