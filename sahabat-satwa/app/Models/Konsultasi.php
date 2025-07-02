<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konsultasi extends Model
{
    use HasFactory;

    protected $table = 'konsultasi';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id_pawrent',
        'id_dokter',
        'pesan',
        'status',
    ];

    // Konsultasi dilakukan oleh satu pawrent
    public function pawrent()
    {
        return $this->belongsTo(Pawrent::class, 'id_pawrent', 'id_pawrent');
    }

    // Konsultasi ditujukan ke satu dokter
    public function dokter()
    {
        return $this->belongsTo(DokterHewan::class, 'id_dokter', 'id_dokter');
    }
    public function rating()
    {
        return $this->hasOne(RatingDokter::class, 'id_dokter', 'id_dokter')
            ->where('id_pawrent', session('pawrent')->id_pawrent);
    }
    public $timestamps = false;

}
