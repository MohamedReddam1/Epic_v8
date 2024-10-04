<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendingVideo extends Model
{
    use HasFactory;
    protected $table = 'pendingvideos';

    protected $primaryKey = 'id_video';

    protected $fillable = [
        'title',
        'content',
        'duree'
    ];
}
