<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    // Mendefinisikan nama tabel yang terkait dengan model 'Barang' menjadi 'barang'.
    protected $table = 'barang';

    // Mendefinisikan kolom-kolom yang dapat diisi (fillable) pada model 'Barang'.
    protected $fillable = [
        'nama_barang',
        'keterangan',
        'gambar',
        'status',
        'total_terjual',
    ];

    // Mendefinisikan tipe data dari kolom 'keterangan' sebagai 'text'.
    protected $casts = [
    'keterangan' => 'text',
    ];

    // Mendefinisikan relasi 'keranjang' dimana 'Barang' memiliki banyak 'Keranjang'.
    public function keranjang()
    {
        return $this->hasMany(Keranjang::class);
    }

    // Mendefinisikan relasi 'portfolio' dimana 'Barang' memiliki banyak 'Portfolio'.
    public function portfolio()
    {
        return $this->hasMany(Portfolio::class);
    }
    
    // Mendefinisikan relasi 'ukuran' dimana 'Barang' memiliki banyak 'Ukuran'.
    public function ukuran()
    {
        return $this->hasMany(Ukuran::class);
    }
}
