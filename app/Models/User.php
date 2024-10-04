<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'image',
        'date_naissance',
        'university',
        'nationality',
        'about' // Ensure this field is included
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    const USER_ROLE = 'USER';
    const ADMIN_ROLE = 'ADMIN';
    const FORMATEUR_ROLE = 'FORMATEUR';
    // app/Models/User.php

    public function diplomas()
    {
        return $this->hasMany(Diploma::class);
    }
    public function formations()
    {
        return $this->hasMany(Formation::class, 'id_user'); // Adjust 'user_id' to match your database column name
    }
    public function wishlists()
    {
        return $this->hasMany(Wishlist::class, 'id_user');
    }
}