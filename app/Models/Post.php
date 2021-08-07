<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $guarded = [];

    function user()
    {
        return $this->belongsTo(User::class);
    }

    // public function comments()
    // {
    //     return $this->hasMany(Comment::class);
    // }

    public function reviews()
    {
        return $this->morphMany(Review::class, 'reviewable');
    }

    public function keywords()
    {
        return $this->morphToMany(Keyword::class, 'keywordable');
    }
}
