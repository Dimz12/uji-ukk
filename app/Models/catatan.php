<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class catatan extends Model
{
    
    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'nama',
        'nik',
        'tanggal',
        'waktu',
        'lokasi',
        'suhu_tubuh'
    ];
}
