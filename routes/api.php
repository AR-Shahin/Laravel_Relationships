<?php

use App\Models\User;
use App\Models\Review;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\Review\ReviewResource;
use App\Http\Resources\Review\ReviewCollection;
use App\Http\Resources\Product\ProductResources;
use App\Http\Resources\Product\ProductCollection;
use App\Http\Resources\User\UserResource;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('products', function () {
    // return ProductResources::collection(Product::get());
    // return new ProductCollection(Product::get());

    # pagination
    return new ProductCollection(Product::paginate(2));
});

Route::get('products/{product}', function (Product $product) {
    return new ProductResources($product);
});

Route::get('reviews', function () {
    //return ReviewResource::collection(Review::get());
    return new ReviewCollection(Review::get());
});


Route::get('reviews/{review}', function (Review $review) {
    return new ReviewResource($review);
});


Route::get('users/{user}', function (User $user) {

    return new UserResource($user);
});
