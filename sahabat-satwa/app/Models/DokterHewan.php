<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DokterHewan extends Model
{
    use HasFactory;

    protected $table = 'dokter_hewan';
    protected $primaryKey = 'id_dokter';

    protected $fillable = [
        'nama_lengkap',
        'no_telepon',
        'tanggal_mulai_bekerja',
        'id_klinik_tetap',
        'spesialisasi',
        'username',
        'password',
        'image',
        'rating'
    ];

    public function klinik()
    {
        return $this->belongsTo(Klinik::class, 'id_klinik_tetap');
    }

    public function kunjungan()
    {
        return $this->hasMany(Kunjungan::class, 'id_dokter');
    }
// Model DokterHewan
public function konsultasi()
{
    return $this->hasMany(Konsultasi::class);
}

    public $timestamps = false;
}
