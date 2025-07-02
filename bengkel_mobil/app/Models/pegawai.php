<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $table = 'pegawai';
    protected $primaryKey = 'ID_Pegawai';
    public $timestamps = false;

    protected $fillable = [
        'ID_Jabatan',
        'Nama_Pegawai',
        'Alamat',
        'Username',
        'PASSWORD',
    ];

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class, 'ID_Jabatan');

    }
    public function nomorTelepon()
{
    return $this->hasMany(NomorPegawai::class, 'ID_Pegawai', 'ID_Pegawai');
}

}
