<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    use HasFactory;
    // Mendefinisikan nama tabel yang terkait dengan model 'Keranjang' menjadi 'keranjang'.
    protected $table = 'keranjang';

    // Mendefinisikan kolom-kolom yang dapat diisi (fillable) pada model 'Keranjang'.
    protected $fillable = [
        'user_id',
        'barang_id',
        'ukuran_id',
        'ukuran_custom_id',
        'jumlah',
    ];

    // Mendefinisikan bahwa model 'Keranjang' memiliki relasi "belongsTo" dengan model 'User',
    // yang mengindikasikan bahwa setiap Keranjang terkait dengan satu User.
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Mendefinisikan bahwa model 'Keranjang' memiliki relasi "belongsTo" dengan model 'Barang',
    // yang mengindikasikan bahwa setiap Keranjang terkait dengan satu Barang.
    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }

    // Mendefinisikan bahwa model 'Keranjang' memiliki relasi "belongsTo" dengan model 'Ukuran',
    // yang mengindikasikan bahwa setiap Keranjang terkait dengan satu Ukuran.
    public function ukuran()
    {
        return $this->belongsTo(Ukuran::class);
    }

    // Mendefinisikan bahwa model 'Keranjang' memiliki relasi "belongsTo" dengan model 'UkuranCustom',
    // yang mengindikasikan bahwa setiap Keranjang terkait dengan satu UkuranCustom.
    public function ukuran_custom()
    {
        return $this->belongsTo(UkuranCustom::class);
    }
}
