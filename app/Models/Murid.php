<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Murid extends Pivot
{
    protected $connection = "mysql";
    protected $table      = "murid";
    protected $primaryKey = "murid_id";
    public $incrementing  = true;
    public $timestamps    = true; //created_at & updated_at

    protected $fillable = [
        'kelas_id',
        'pengguna_id',
    ];


}
