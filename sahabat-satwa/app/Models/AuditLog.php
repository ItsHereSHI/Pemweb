<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuditLog extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika tidak menggunakan konvensi Laravel
    protected $table = 'audit_log';

    // Tentukan kolom yang dapat diisi massal (fillable)
    protected $fillable = ['user_id', 'action', 'timestamp'];


}
