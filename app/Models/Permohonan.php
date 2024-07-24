<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Permohonan extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_registrasi',
        'layanan',
        'user_id',
        'full_name',
        'phone',
        'address',
        'status',
        'keterangan',
        'created_at',
        'updated_at'
    ];

    public function document(): HasMany
    {
        return $this->hasMany(Dokumen::class);
    }
}
