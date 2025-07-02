<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pawrent extends Model
{
    use HasFactory;

    protected $table = 'pawrent';
    protected $primaryKey = 'id_pawrent';
    protected $fillable = ['nama_lengkap', 'no_telepon','username','password'  ];

    public function hewan()
    {
        return $this->hasMany(Hewan::class, 'id_pawrent');
    }
    public $timestamps = false;

}


