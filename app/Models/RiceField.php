<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiceField extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 
        'harga', 
        'luas', 
        'alamat', 
        'maps', 
        'deskripsi', 
        'sertifikasi', 
        'tipe',
    ];
}
