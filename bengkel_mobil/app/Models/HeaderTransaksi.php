<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HeaderTransaksi extends Model
{
    protected $table = 'header_transaksi';
    protected $primaryKey = 'ID_Header';
    public $timestamps = false;

    protected $fillable = [
        'ID_Pegawai',
        'ID_Transaksi',
    ];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'ID_Pegawai');
    }

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class, 'ID_Transaksi');
    }
}
