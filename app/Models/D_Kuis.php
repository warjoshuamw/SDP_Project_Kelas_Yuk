<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class D_Kuis extends Model
{
    use HasFactory;
    use SoftDeletes; // deleted_at

    protected $connection = "mysql";
    protected $table      = "d_kuis";
    protected $primaryKey = "d_kuis_id";
    public $incrementing  = true;
    public $timestamps    = true; //created_at & updated_at

    protected $fillable = [
        'kuis_id',
        'pertanyaan',
        'pilihan_a',
        'pilihan_b',
        'pilihan_c',
        'pilihan_d',
        'pilihan',
        'isian',
    ];
    public function KuisJawaban()
    {
        return $this->belongsToMany(Murid::class,'jawaban_murid_kuis','d_kuis_id','murid_id')->withPivot('jawaban','jawaban_murid_kuis_id','nilai');
    }
}
