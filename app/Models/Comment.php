<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    // protected $fillable = [
        
    // ];
    protected $guarded = [];

    public function replies(Type $var = null)
    {
        # code...
        return $this->hasMany(CommentReply::class);
    }
}
