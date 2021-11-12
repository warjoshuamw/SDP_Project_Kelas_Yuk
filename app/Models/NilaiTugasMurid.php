<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NilaiTugasMurid extends Model
{
    use HasFactory;
    use SoftDeletes; // deleted_at

    protected $connection = "mysql";
    protected $table      = "nilai_tugas_murid";
    protected $primaryKey = "nilai_tugas_murid_id";
    public $incrementing  = true;
    public $timestamps    = true; //created_at & updated_at

    protected $fillable = [
        'tugas_id',
        'murid_id',
        'url_pengumpulan',
        'nilai'
    ];
    public function PunyaMurid()
    {
        return $this->belongsTo(Murid::class, 'murid_id', 'murid_id');
    }


}
