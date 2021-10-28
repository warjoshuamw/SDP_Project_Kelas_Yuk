<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pengguna extends Model
{
    use HasFactory;
    use SoftDeletes; // deleted_at

    protected $connection = "mysql";
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

    public function KelasGuru()
    {
        return $this->hasMany(Kelas::class,'pengguna_id','pengguna_id'); //menghubungkan pengguna dengan kelas menggunakan one to many
    }

    public function KelasMurid()
    {
        return $this->belongsToMany(Kelas::class,'murid','pengguna_id','kelas_id');
    }
}
