<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'is_active',
        'photo_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role(Type $var = null)
    {
        # code...
        return $this->belongsTo(Role::class);
    }

    public function photo(Type $var = null)
    {
        # code...
        return $this->belongsTo(Photo::class);
    }

    // public function setPasswordAttribute($password)
    // {
    //     # code...
    //     if ($password) {
    //         $this -> attributes['password'] = bcrypt($password);
    //     }
    // }

    public function isAdmin(Type $var = null)
    {
        # code...
        if ($this->role->name == 'administrator' && $this->is_active == 1) {
            return true;
        }
        return false;
    }

    public function posts(Type $var = null)
    {
        # code...
        return $this->hasMany(Post::class);
    }
}
