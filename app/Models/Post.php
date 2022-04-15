<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];
    use HasFactory;


    public function user(Type $var = null)
    {
        # code...
        return $this->belongsTo(User::class);
    }

    public function photo(Type $var = null)
    {
        # code...
        return $this->belongsTo(Photo::class);
    }

    public function category(Type $var = null)
    {
        # code...
        return $this->belongsTo(Category::class);
    }

    public function comments(Type $var = null)
    {
        # code...
        return $this->hasMany(Comment::class);
    }
}
