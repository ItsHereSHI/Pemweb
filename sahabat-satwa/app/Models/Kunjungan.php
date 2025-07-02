<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kunjungan extends Model
{
    use HasFactory;

    protected $table = 'kunjungan';
    protected $dates = ['tanggal_kunjungan'];
    protected $primaryKey = 'id_kunjungan';
    protected $fillable = ['id_hewan', 'id_dokter', 'tanggal_kunjungan', 'id_kunjungan_sebelumnya','deskripsi'];

    // Relasi dengan model Hewan
    public function hewan()
    {
        return $this->belongsTo(Hewan::class, 'id_hewan');
    }

    // Relasi dengan model DokterHewan
    public function dokterHewan()
    {
        return $this->belongsTo(DokterHewan::class, 'id_dokter');
    }

    // Relasi dengan kunjungan sebelumnya
    public function kunjunganSebelumnya()
    {
        return $this->belongsTo(Kunjungan::class, 'id_kunjungan_sebelumnya');
    }
    public $timestamps = false;
}
