<?php

use App\CheckAge;
use App\Models\City;
use App\Models\User;
use App\Mail\AdminMail;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Mail\SendUnVerifiedEmail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OneToOneController;
use App\Http\Controllers\OneToManyController;
use App\Http\Controllers\ManyToManyController;
use App\Http\Controllers\ValidationController;
use App\Http\Controllers\OneToManyPolyController;
use App\Http\Controllers\ManyToManyMorphController;

Route::get('/', function () {
    // sleep(5);
    return view('welcome');
});

Route::get('/poly', function () {
    return view('poly', [
        'users' => User::latest()->paginate(15)
    ]);
})->name('poly')->middleware('auth');
// Route::get('service', function (CheckAge $ca) {
//     // app()->bind('Shahin', function () {
//     //     return 'ARS';
//     // });
//     // dd(app());

//     $ca->provideBirthYear(2000);
//     dd($ca->getAge());
//     // dd(resolve('CheckAge'));
// });

# Cache
Route::get('cache', function () {
    // if (cache()->has('products')) {
    //     return cache('products');
    // }
    // return 'nai';
    // return Product::find(4)->delete();
    // return  Product::create([
    //     'user_id' => auth()->id(),
    //     'title' => 'New Post ' . rand(40, 80),
    //     'view' => 10,
    //     'price' => 10,
    // ]);

    return Product::find(12)->update([
        'title' => 'Update Post ' . rand(40, 80)
    ]);
});

Route::get('response-cache', function () {

    $products = Product::with('user')->latest()->get();
    return view('cache', compact('products'));
})->middleware(['auth', 'cache_response:10']);

Route::get('/dashboard', function () {
    //return 1;
    // return cache()->get('s', 'nai');
    // return  Cache::get('foo', function () {
    //     return 'nai re';
    // });
    //return Cache::forget('products');
    // $products = Cache::remember('products', now()->addSeconds(5), function () {
    //     return Product::with('user')->latest()->get();
    // });

    $products = Cache::rememberForever('products', function () {
        return Product::with('user')->latest()->get();
    });

    // if (cache()->has('products')) {
    //     return cache()->get('products');
    // } else {
    //     return 'nai';
    // }
    // $products =  cache('products', function () {
    //     return Product::with('user')->get();
    // });

    // $products = Cache::remember('products', 15, function () {
    //     return Product::get();
    // });

    return view('dashboard', compact('products'));
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

// Route::view('class', 'testing.class', [
//     'isActive' => true,
// ]);

// Route::get('one-to-one', [OneToOneController::class, 'oneToOne']);

// Route::get('one-to-many', [OneToManyController::class, 'oneToMany']);


// Route::get('has', function () {

//     $data = [];
//     return view('has.index', compact('data'));
// });



// Route::get('category', function () {
//     $categories = Category::get();
//     $parent_category = Category::whereHas('children')->with('children')->get();
//     return view('category.index', compact('categories', 'parent_category'));
// });

// Route::post('category', function (Request $request) {
//     Category::create($request->all());
//     return back();
// })->name('category');


// Route::get('many-to-many', [ManyToManyController::class, 'index']);

Route::get('/mail', function () {

    $data = [10, 20, 'shahin'];
    Mail::to('a@mail.com')->queue(new AdminMail($data));
    mail('a@mail.com', 'subject', 'body');
    // return 1;
    // $users = User::whereIsVerified(0)->first();
    // Mail::to($users->email)->send(new SendUnVerifiedEmail($users));
    // foreach ($users as $user => $index) {
    //     // info($index + 1 . 'Mail has sent!');
    //     echo $user->email . '<br>';
    //     // Mail::to($user->email)->send(new SendUnVerifiedEmail($user));
    // }
    // return  City::where('people', '<',  300)->get();
});


// Route::get('poly-one-to-many', [OneToManyPolyController::class, 'oneToManyPolymorphic']);

// Route::get('poly-many-to-many', [ManyToManyMorphController::class, 'index']);

// # View
// Route::get('view', function () {
//     //return view('view.test');
//     // return View::make('welcome');

//     $test = 'shahin';
//     return view('view.view', compact('test'))->with('arr', [10, 20, 30]);
// });

// Route::get('user/{user}', function (User $user) {
//     return $user;
// })->name('user');


// # Component

// Route::get('component', function () {
//     $users = User::take(5)->get();
//     return view('component', compact('users'));
// });

// # Validation

// Route::get('validation', [ValidationController::class, 'create']);
// Route::post('validation', [ValidationController::class, 'store']);


// Route::get('user', function () {

//     $user = User::all()->toArray();
//     var_dump($user);
//     //  return $user->makeVisible('email')->toArray();
//     //return $user->makeHidden('name')->toArray();
// });


# Post Routes

Route::resource('post', PostController::class)->middleware(['auth']);

Route::get('fuck', fn () => 'Protected!')->middleware('can:isAdmin')->name('fuck');


# Http
Route::get('http', function () {
    $get =  Http::get('https://jsonplaceholder.typicode.com/posts/');

    dd($get->headers());
});


#gate and policy

Route::resource('product', ProductController::class)->middleware('auth');
