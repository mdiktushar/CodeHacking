<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = [
        'file',
    ];
    protected $uploads = 'http://127.0.0.1:8000/image/';
    use HasFactory;

    public function getFileAttribute($photo)
    {
        # code...
        return $this -> uploads.$photo;
    }
}
