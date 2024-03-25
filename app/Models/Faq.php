<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory;
    // Mendefinisikan nama tabel yang terkait dengan model 'Faq' menjadi 'faq'.
    protected $table = 'faq';

    // Mendefinisikan kolom-kolom yang dapat diisi (fillable) pada model 'Faq'.
    protected $fillable = [
        'penanya_id',
        'penjawab_id',
        'pertanyaan',
        'jawaban',
    ];

    /**
     * Mendefinisikan relasi antara model 'Faq' dengan model 'User'.
     * Relasi ini menunjukkan bahwa satu pertanyaan hanya dimiliki oleh satu user.
     */
    public function penanya()
    {
        return $this->belongsTo(User::class, 'penanya_id');
    }

    /**
     * Mendefinisikan relasi antara model 'Faq' dengan model 'User'.
     * Relasi ini menunjukkan bahwa satu jawaban hanya dimiliki oleh satu user.
     */
    public function penjawab()
    {
        return $this->belongsTo(User::class, 'penjawab_id');
    }
}
