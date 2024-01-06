<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permissions extends Model
{
    use HasFactory;

    // Mendefinisikan nama tabel yang terkait dengan model 'Permissions' menjadi 'permissions'.
    protected $table = 'permissions';

    // Mendefinisikan kolom-kolom yang dapat diisi (fillable) pada model 'Permissions'.
    protected $fillable = [
        'name',
    ];

    // Mendefinisikan bahwa model 'Permissions' memiliki relasi "belongsToMany" dengan model 'Permissions',
    // yang mengindikasikan hubungan banyak-ke-banyak antara izin (permissions).
    public function permissions()
    {
        return $this->belongsToMany(Permissions::class, 'roles_permissions', 'permissions_id', 'roles_id');
    }
}
