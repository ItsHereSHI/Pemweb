<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $table = 'members'; // Nama tabel
    protected $primaryKey = 'id_member'; // Primary key
    public $timestamps = false; // Nonaktifkan timestamps jika tidak digunakan

    protected $fillable = [
        'nama',
        'username',
        'password',
    ];

    public function portofolios()
    {
        return $this->hasMany(Portofolio::class, 'id_member', 'id_member');
    }
}
