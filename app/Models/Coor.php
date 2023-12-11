<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Coor extends Model
{

    use HasFactory;
    protected $table = 'maps'; // Ganti 'nama_tabel_anda' dengan nama tabel sebenarnya
    protected $primaryKey = 'id';

    protected $fillable = [
        'name', 'latitude', 'longitude' // Sesuaikan dengan nama kolom pada tabel Anda
    ];
}
