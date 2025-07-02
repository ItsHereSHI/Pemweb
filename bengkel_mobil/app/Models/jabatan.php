<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    protected $table = 'jabatan';
    protected $primaryKey = 'ID_Jabatan';
    public $timestamps = false;

    protected $fillable = [
        'Nama_Jabatan',
        'Gaji',
    ];

    public function pegawai()
    {
        return $this->hasMany(Pegawai::class, 'ID_Jabatan', 'ID_Jabatan');
    }
}
