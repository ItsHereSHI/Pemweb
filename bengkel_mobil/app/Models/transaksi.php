<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';
    protected $primaryKey = 'ID_Transaksi';
    public $timestamps = false;

    protected $fillable = [
        'ID_Pelanggan',
        'Tanggal_Pembelian',
        'Total_Biaya',
    ];

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'ID_Pelanggan');
    }


public function pegawai()
{
    return $this->belongsTo(Pegawai::class, 'ID_Pegawai');
}

}
