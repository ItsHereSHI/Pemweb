<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RatingDokter extends Model
{
    protected $table = 'rating_dokter';
    protected $fillable = ['id_pawrent', 'id_dokter', 'rating'];

}
