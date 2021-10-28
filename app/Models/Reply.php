<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reply extends Model
{
    use HasFactory;
    use SoftDeletes; // deleted_at

    protected $connection = "mysql";
    protected $table      = "reply";
    protected $primaryKey = "reply_id";
    public $incrementing  = true;
    public $timestamps    = true; //created_at & updated_at

    protected $fillable = [
        'comment_id',
        'pengguna_id',
        'reply_creator',
        'keterangan',
    ];
}
