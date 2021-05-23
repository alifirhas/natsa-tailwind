<?php

namespace App\Models;

use App\Models\User;
use App\Models\Region;
use App\Models\Vestige;
use App\Models\RiceField;
use App\Models\Irrigation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
        'user_id',
        'vestige_id',
        'irrigation_id',
        'region_id',
    ];

    //relasi user dan riceField
    public function user(){
        return $this->belongsTo(User::class);
    }

    //relasi vestige dan riceField
    public function vestige(){
        return $this->belongsTo(Vestige::class);
    }

    //relasi irrigation dan riceField
    public function irrigation(){
        return $this->belongsTo(Irrigation::class);
    }

    //relasi region dan riceField
    public function region(){
        return $this->belongsTo(Region::class);
    }
}
