<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detailpelanggan extends Model
{
    use HasFactory;

    // Mendefinisikan nama tabel yang terkait dengan model 'DetailPelanggan' menjadi 'detailpelanggan'.
    protected $table = 'detail_pelanggan';

    // Mendefinisikan kolom-kolom yang dapat diisi (fillable) pada model 'DetailPelanggan'.
    protected $fillable = [
        'user_id',
        'no_wa',
        'alamat',
    ];

    // Mendefinisikan bahwa model 'DetailPelanggan' memiliki relasi "belongsTo" dengan model 'User',
    // yang mengindikasikan bahwa setiap DetailPelanggan "milik" satu User.
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
