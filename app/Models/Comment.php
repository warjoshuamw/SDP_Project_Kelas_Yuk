<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory;
    use SoftDeletes; // deleted_at

    protected $connection = "mysql";
    protected $table      = "comment";
    protected $primaryKey = "comment_id";
    public $incrementing  = true;
    public $timestamps    = true; //created_at & updated_at

    protected $fillable = [
        'feed_id',
        'pengguna_id',
        'comment_creator',
        'keterangan',
    ];
}
