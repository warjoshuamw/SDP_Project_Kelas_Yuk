<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kelas extends Model
{
    use HasFactory;
    use SoftDeletes; // deleted_at

    protected $connection = "mysql";
    protected $table      = "kelas";
    protected $primaryKey = "kelas_id";
    public $incrementing  = true;
    public $timestamps    = true; //created_at & updated_at

    protected $fillable = [
        'pengguna_id',
        'kelas_kode',
        'kelas_nama',
        'kelas_deskripsi',
        'waktu_mulai',
        'waktu_selesai',
        'status',
    ];

    public function Guru()
    {
        return $this->belongsTo(Pengguna::class,'pengguna_id','pengguna_id');
    }

    public function Murid()
    {
        return $this->belongsToMany(Pengguna::class,'murid','kelas_id','pengguna_id');
    }
}
