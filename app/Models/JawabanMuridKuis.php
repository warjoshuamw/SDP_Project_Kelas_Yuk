<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class JawabanMuridKuis extends Pivot
{
    use HasFactory;
    protected $connection = "mysql";
    protected $table      = "jawaban_murid_kuis";
    protected $primaryKey = "jawaban_murid_kuis_id";
    public $incrementing  = true;
    public $timestamps    = true; //created_at & updated_at

    protected $fillable = [
        'd_kuis_id',
        'murid_id',
        'jawaban',
        'nilai',
    ];
}
