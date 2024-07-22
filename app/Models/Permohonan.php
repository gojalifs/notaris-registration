<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permohonan extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_registrasi',
        'layanan_id',
        'user_id',
        'status',
        'keterangan',
        'created_at',
        'updated_at'
    ];
}
