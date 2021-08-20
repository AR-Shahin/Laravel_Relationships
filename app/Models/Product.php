<?php

namespace App\Models;

use App\Events\ProductDeleted;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $dispatchesEvents = [
        'deleted' => ProductDeleted::class
    ];
    function user()
    {
        return $this->belongsTo(User::class);
    }
    public function reviews()
    {
        return $this->morphMany(Review::class, 'reviewable');
    }

    public function keywords()
    {
        return $this->morphToMany(Keyword::class, 'keywordable');
    }

    protected static function booted()
    {
        // static::deleted(function ($product) {
        //     info('deleted!');
        // });

        static::created(function ($product) {
            cache()->forget('products');

            $products = Product::with('user')->latest()->get();
            cache('products', $products);
        });
    }
}
