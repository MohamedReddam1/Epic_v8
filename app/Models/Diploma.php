<?php

// app/Models/Diploma.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diploma extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'diploma'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}