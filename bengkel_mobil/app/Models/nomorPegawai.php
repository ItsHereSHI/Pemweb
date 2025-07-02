<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NomorPegawai extends Model
{
    protected $table = 'nomor_pegawai';
    protected $primaryKey = 'ID_Nomor';
    public $timestamps = false;

    protected $fillable = [
        'ID_Pegawai',
        'No_Tlp',
    ];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'ID_Pegawai', 'ID_Pegawai');
    }
}
