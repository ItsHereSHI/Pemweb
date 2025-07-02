<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sparepart extends Model
{
    protected $table = 'sparepart';
    protected $primaryKey = 'ID_Sparepart';
    public $timestamps = false;

    protected $fillable = [
        'Nama_Sparepart',
        'Stok',
        'Jenis_Sparepart',
        'Harga',
    ];
}
