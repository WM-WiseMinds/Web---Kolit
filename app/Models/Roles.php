<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    use HasFactory;
    
    // Mendefinisikan nama tabel yang terkait dengan model 'Role' menjadi 'roles'.
    protected $table = 'roles';

    // Mendefinisikan kolom-kolom yang dapat diisi (fillable) pada model 'Role'.
    protected $fillable = [
        'name',
    ];

    // Mendefinisikan bahwa model 'Role' memiliki relasi "belongsToMany" dengan model 'Permissions',
    // yang mengindikasikan hubungan banyak-ke-banyak antara role dan izin (permissions).
    public function permissions()
    {
        return $this->belongsToMany(Permissions::class, 'role_permission', 'roles_id', 'permissions_id');
    }

    // Mendefinisikan bahwa model 'Role' memiliki relasi "hasMany" dengan model 'User',
    // yang mengindikasikan bahwa satu Role dapat memiliki banyak User.
    public function user()
    {
        return $this->hasMany(User::class, 'role_id');
    }
}