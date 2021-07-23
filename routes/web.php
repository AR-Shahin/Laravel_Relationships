<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OneToOneController;
use App\Http\Controllers\OneToManyController;



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
