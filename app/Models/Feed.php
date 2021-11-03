<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Feed extends Model
{
    use HasFactory;
    use SoftDeletes; // deleted_at

    protected $connection = "mysql";
    protected $table      = "feed";
    protected $primaryKey = "feed_id";
    public $incrementing  = true;
    public $timestamps    = true; //created_at & updated_at

    protected $fillable = [
        'kelas_id',
        'pengguna_id',
        'feed_creator',
        'keterangan',
    ];

    public function Kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id', 'kelas_id');
    }

    public function Comment()
    {
        return $this->hasMany(Comment::class, 'feed_id', 'feed_id');
    }
}
