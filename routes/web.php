<?php

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OneToOneController;
use App\Http\Controllers\OneToManyController;
use App\Http\Controllers\ManyToManyController;
use App\Mail\SendUnVerifiedEmail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

Route::view('class', 'testing.class', [
    'isActive' => true,
]);

Route::get('one-to-one', [OneToOneController::class, 'oneToOne']);

Route::get('one-to-many', [OneToManyController::class, 'oneToMany']);


Route::get('has', function () {

    $data = [];
    return view('has.index', compact('data'));
});



Route::get('category', function () {
    $categories = Category::get();
    $parent_category = Category::whereHas('children')->with('children')->get();
    return view('category.index', compact('categories', 'parent_category'));
});

Route::post('category', function (Request $request) {
    Category::create($request->all());
    return back();
})->name('category');


Route::get('many-to-many', [ManyToManyController::class, 'index']);

Route::get('/mail', function () {
    $users = User::whereIsVerified(0)->get();
    foreach ($users as $user => $index) {
        info($index + 1 . 'Mail has sent!');
        Mail::to($user->email)->send(new SendUnVerifiedEmail($user));
    }
});
