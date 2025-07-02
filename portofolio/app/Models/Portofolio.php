<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portofolio extends Model
{
    use HasFactory;

    protected $table = 'portofolio'; // Nama tabel
    protected $primaryKey = 'id_portofolio'; // Primary key
    public $timestamps = false; // Nonaktifkan timestamps jika tidak digunakan

    public function member()
    {
        return $this->belongsTo(Member::class, 'id_member', 'id_member');
    }
}
