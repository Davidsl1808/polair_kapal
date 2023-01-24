<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Data_kendaraan extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_kategori',
        'No_pol', 
        'jam_masuk',
        'jam_keluar',
        'bayar',
        'id_user',
        'status_member',
        'status_parkir',

    ];

    // public function kendaraan(): HasMany
    // {
    //     return $this->hasMany(Kategori::class, 'id_kategori', 'id');
    // }

    /**
     * Get the user that owns the Data_kendaraan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kendaraan(): BelongsTo
    {
        return $this->belongsTo(Kategori::class, 'id_kategori', 'id');
    }
    public function petugas(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

}
