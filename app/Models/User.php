<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Itineraries;
use App\Models\Favorites;
use App\Models\Comment;


class User extends Authenticatable
{
    
    use HasFactory, Notifiable;
    protected $table = 'users';
    protected $dates = ['deleted_at'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function itineraries()
    {
        return $this->hasMany(Itineraries::class);
    }

    public function favorites()
    {
        return $this->hasMany(Favorites::class);
    }

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }
}
