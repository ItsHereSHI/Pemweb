<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PembelianSparepart extends Model
{
    protected $table = 'pembelian_sparepart';
    protected $primaryKey = 'ID_Pembelian_Sparepart';
    public $timestamps = false;

    protected $fillable = [
        'ID_Transaksi',
        'ID_Sparepart',
        'Jumlah_Beli',
    ];

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class, 'ID_Transaksi');
    }

    public function sparepart()
    {
        return $this->belongsTo(Sparepart::class, 'ID_Sparepart');
    }
}
