<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Picup extends Model
{
    use HasFactory;

    protected $table = "picup";
    protected $fillable = [
        'nama', 
        'deskripsi',
        'id_peta',
    ];

    public function map()
    {
        return $this->hasOne(Maps::class, 'id_peta', 'id')->onDelete('cascade');
    }
}
