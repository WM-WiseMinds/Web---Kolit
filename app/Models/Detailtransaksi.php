<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detailtransaksi extends Model
{
    use HasFactory;

    // Mendefinisikan nama tabel yang terkait dengan model 'DetailTransaksi' menjadi 'detailtransaksi'.
    protected $table = 'detailtransaksi';

    // Mendefinisikan kolom-kolom yang dapat diisi (fillable) pada model 'DetailTransaksi'.
    protected $fillable = [
        'transaksi_id',
        'nama_barang',
        'jumlah',
        'ukuran',
        'harga',
    ];

    // Mendefinisikan bahwa model 'DetailTransaksi' memiliki relasi "belongsTo" dengan model 'Transaksi',
    // yang mengindikasikan bahwa setiap DetailTransaksi "milik" satu Transaksi.
    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class);
    }
}
