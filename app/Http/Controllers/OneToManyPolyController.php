<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;

class OneToManyPolyController extends Controller
{
    public function oneToManyPolymorphic()
    {
        # insert
        // return  Product::find(1)->reviews()->create([
        //     'user_id' => 1,
        //     'body' => 'comment for product'
        // ]);

        # insert many
        // return  Post::find(3)->reviews()->createMany([
        //     [
        //         'user_id' => 1,
        //         'body' => 'comment for post'
        //     ],
        //     [
        //         'user_id' => 2,
        //         'body' => 'comment for post'
        //     ],
        //     [
        //         'user_id' => 3,
        //         'body' => 'comment for post'
        //     ],
        // ]);

        # update
        // return  Product::find(2)->reviews()->where('is_active', 0)->update([
        //     'is_active' => 1
        // ]);

        # delete
        // return  Post::find(3)->reviews()->whereIsActive(1)->delete();
        // return  Post::find(3)->reviews()->delete();

        // return Review::find(1)->reviewable;

        # conditions in reviews table
        // $post = Post::with(['reviews' => function ($q) {
        //     $q->whereIsActive(1);
        // }])->find(7);

        # Get all reviews
        // return Post::withCount('reviews')->get();
        // $reviews = Review::with('reviewable')->get();

        # get All reviews where has [post or product]
        $reviews = Review::with('reviewable')->whereHasMorph('reviewable', '*')->get();
        return view('oneToMany.poly', compact('reviews'));
    }
}
