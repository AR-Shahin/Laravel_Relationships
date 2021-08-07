<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Keyword extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function posts()
    {
        return $this->morphedByMany(Post::class, 'keywordable');
    }

    public function products()
    {
        return $this->morphedByMany(Product::class, 'keywordable');
    }
}
