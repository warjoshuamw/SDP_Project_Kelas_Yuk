<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pengguna extends Model
{
    use HasFactory;
    use SoftDeletes; // deleted_at

    protected $connection = "sdp_kelas_yuk";
    protected $table      = "pengguna";
    protected $primaryKey = "pengguna_id";
    public $incrementing  = true;
    public $timestamps    = true; //created_at & updated_at

    protected $fillable = [
        'pengguna_nama',
        'pengguna_email',
        'pengguna_password',
        'pengguna_peran',
        'pengguna_tampilan',
    ];
}
