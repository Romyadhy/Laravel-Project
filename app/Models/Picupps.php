<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Picupps extends Model
{
    use HasFactory;

    protected $table = "picupps";
    protected $fillable = [
        'nama', 
        'deskripsi',
        'id_maps',
    ];

    public function map()
    {
        return $this->belongsTo(Mapps::class, 'id_maps');
    }
}
