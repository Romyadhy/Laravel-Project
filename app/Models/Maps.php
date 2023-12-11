<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maps extends Model
{
    use HasFactory;

    protected $table = "peta";
    protected $fillable = [
        'nama_maps', 
        'latitude',
        'longitude'

    ];

    public function picup()
    {
        return $this->belongsTo(Picup::class, 'id_peta', 'id')->onDelete('cascade');
    }
}
