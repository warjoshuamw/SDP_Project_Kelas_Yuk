<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tugas extends Model
{
    use HasFactory;
    use SoftDeletes; // deleted_at

    protected $connection = "sdp_kelas_yuk";
    protected $table      = "tugas";
    protected $primaryKey = "tugas_id";
    public $incrementing  = true;
    public $timestamps    = true; //created_at & updated_at

    protected $fillable = [
        'kelas_id',
        'batas_awal',
        'batas_akhir',
        'keterangan',
        'status',
        'url_soal',
    ];
}
