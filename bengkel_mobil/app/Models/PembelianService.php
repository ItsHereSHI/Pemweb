<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PembelianService extends Model
{
    protected $table = 'pembelian_service';
    protected $primaryKey = 'ID_Pembelian_Service';
    public $timestamps = false;

    protected $fillable = [
        'ID_Transaksi',
        'ID_Pegawai',
        'ID_Service',
    ];

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class, 'ID_Transaksi');
    }

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'ID_Pegawai');
    }

    public function service()
    {
        return $this->belongsTo(Service::class, 'ID_Service');
    }
}
