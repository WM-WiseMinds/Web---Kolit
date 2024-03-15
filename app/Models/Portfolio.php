<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;
    // Mendefinisikan nama tabel yang terkait dengan model 'Portfolio' menjadi 'portfolio'.
    protected $table = 'portfolio';

    // Mendefinisikan kolom-kolom yang dapat diisi (fillable) pada model 'Portfolio'.
    protected $fillable = [
        'barang_id',
        'judul',
        'tanggal_pengerjaan',
        'deskripsi',
        'gambar',
    ];

    // Mendefinisikan bahwa model 'Portfolio' memiliki relasi "belongsTo" dengan model 'Barang',
    // yang mengindikasikan bahwa setiap Portfolio terkait dengan satu Barang.
    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
}
