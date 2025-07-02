<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hewan extends Model
{
    use HasFactory;

    protected $table = 'hewan';

    protected $primaryKey = 'id_hewan';

    protected $fillable = ['nama_hewan', 'tahun_lahir', 'jenis_hewan', 'id_pawrent'];

    public function pawrent()
    {
        return $this->belongsTo(Pawrent::class, 'id_pawrent');
    }

    public function kunjungan()
    {
        return $this->hasMany(Kunjungan::class, 'id_hewan');
    }
    public $timestamps = false;
}
