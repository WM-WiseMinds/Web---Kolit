<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ukuran extends Model
{
    use HasFactory;
    
    // Mendefinisikan nama tabel yang terkait dengan model 'Ukuran' menjadi 'ukuran'.
    protected $table = 'ukuran';

    // Mendefinisikan kolom-kolom yang dapat diisi (fillable) pada model 'Ukuran'.
    protected $fillable = [
        'barang_id',
        'ukuran',
        'stok',
        'deskripsi',
    ];

    // Mendefinisikan tipe data dari kolom 'deskripsi' sebagai 'text'.
    protected $casts = [
        'deskripsi' => 'text',
    ];

    // Mendefinisikan bahwa model 'Ukuran' memiliki relasi "hasMany" dengan model 'Keranjang',
    // yang mengindikasikan bahwa satu Ukuran dapat memiliki banyak Keranjang.
    public function keranjang()
    {
        return $this->hasMany(Keranjang::class, 'ukuran_id');
    }

    // Mendefinisikan bahwa model 'Ukuran' memiliki relasi "belongsTo" dengan model 'Barang',
    // yang mengindikasikan bahwa setiap Ukuran terkait dengan satu Barang.
    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
}
