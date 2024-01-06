<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

     // Mendefinisikan nama tabel yang terkait dengan model 'User' menjadi 'users'.
    protected $table = 'users';
    
    // Mendefinisikan kolom-kolom yang dapat diisi (fillable) pada model 'User'.
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */

    // Mendefinisikan atribut yang harus disembunyikan saat serialisasi model.
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    // Mendefinisikan atribut yang akan di-cast ke tipe data tertentu.
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */


    // Mendefinisikan atribut yang akan ditambahkan ke bentuk array model.
    protected $appends = [
        'profile_photo_url',
    ];

    // Mendefinisikan bahwa model 'User' memiliki relasi "belongsTo" dengan model 'Roles',
    // yang mengindikasikan bahwa setiap User terkait dengan satu Role.
    public function roles()
    {
        return $this->belongsTo(Roles::class, 'role_id');
    }

    // Mendefinisikan bahwa model 'User' memiliki relasi "hasMany" dengan model 'Transaksi',
    // yang mengindikasikan bahwa satu User dapat memiliki banyak Transaksi.
    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }

    // Mendefinisikan bahwa model 'User' memiliki relasi "hasMany" dengan model 'Faq',
    // yang mengindikasikan bahwa satu User dapat memiliki banyak Faq.
    public function faq()
    {
        return $this->hasMany(Faq::class);
    }

    // Mendefinisikan bahwa model 'User' memiliki relasi "hasOne" dengan model 'Keranjang',
    // yang mengindikasikan bahwa satu User memiliki satu Keranjang.
    public function keranjang()
    {
        return $this->hasOne(Keranjang::class);
    }

    // Mendefinisikan bahwa model 'User' memiliki relasi "hasOne" dengan model 'Detailpelanggan',
    // yang mengindikasikan bahwa satu User memiliki satu Detailpelanggan.
    public function detailpelanggan()
    {
        return $this->hasOne(Detailpelanggan::class);
    }

}
