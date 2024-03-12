<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    // Mendefinisikan nama tabel yang terkait dengan model 'Transaksi' menjadi 'transaksi'.
    protected $table = 'transaksi';

    // Mendefinisikan kolom-kolom yang dapat diisi (fillable) pada model 'Transaksi'.
    protected $fillable = [
        'user_id',
        'total_harga',
        'bukti_pembayaran',
        'status',
    ];

    // Mendefinisikan bahwa model 'Transaksi' memiliki relasi "belongsTo" dengan model 'User',
    // yang mengindikasikan bahwa setiap Transaksi terkait dengan satu User.
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Mendefinisikan bahwa model 'Transaksi' memiliki relasi "hasMany" dengan model 'Detailtransaksi',
    // yang mengindikasikan bahwa satu Transaksi dapat memiliki banyak Detailtransaksi.
    public function detailtransaksi()
    {
        return $this->hasMany(Detailtransaksi::class);
    }
}
