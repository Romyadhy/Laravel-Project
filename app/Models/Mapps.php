<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapps extends Model
{
    use HasFactory;

    protected $table = "mapps";
    protected $fillable = [
        'nama_maps',
        'latitude',
        'longitude'
    ];

    public function picups()
    {
        return $this->hasMany(Picupps::class, 'id_maps');
    }
}
