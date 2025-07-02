<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resep extends Model
{
    use HasFactory;

    protected $table = 'resep';
    protected $primaryKey = 'id_resep';
    protected $fillable = ['id_kunjungan', 'id_obat', 'dosis', 'frekuensi'];

    public function kunjungan()
    {
        return $this->belongsTo(Kunjungan::class, 'id_kunjungan');
    }

    public function obat()
    {
        return $this->belongsTo(Obat::class, 'id_obat');
    }
    public $timestamps = false;
}
