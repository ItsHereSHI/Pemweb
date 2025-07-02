<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Klinik extends Model
{
    use HasFactory;

    protected $table = 'klinik';
    protected $primaryKey = 'id_klinik';
    protected $fillable = ['nama_klinik', 'alamat', 'no_telepon'];

    public function dokterHewan()
    {
        return $this->hasMany(DokterHewan::class, 'id_klinik_tetap');
    }
    public $timestamps = false;
}
