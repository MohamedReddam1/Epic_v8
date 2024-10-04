<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_notification';
    protected $read_at = 'read_at';
    // protected $fillable = [
    //     'id_notification',
    //     'id_user',
    //     'content',
    //     'read_at'

    // ];
}
