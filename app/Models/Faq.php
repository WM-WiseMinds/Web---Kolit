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

    // Mendefinisikan tipe data dari kolom 'pertanyaan' dan 'jawaban' sebagai 'text'.
    protected $casts = [
        'pertanyaan' => 'text',
        'jawaban' => 'text',
    ];

    // Mendefinisikan bahwa model 'Faq' memiliki relasi "belongsTo" dengan model 'User',
    // yang mengindikasikan bahwa setiap Faq "milik" satu User.
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
