<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'service';
    protected $primaryKey = 'ID_Servis';
    public $timestamps = false;

    protected $fillable = [
        'Nama_Service',
        'Lama_Pengerjaan',
        'Harga',
    ];
}
