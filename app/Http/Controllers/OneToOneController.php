<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class OneToOneController extends Controller
{
    function oneToOne()
    {

        //  return User::get()->count();
        # withOnly(['profile', 'posts'])->
        # without('profile')->

        // get all user where post code is null
        // return User::whereHas('profile', function ($q) {
        //     $q->whereNull('post_code');
        // })->get();

        // get all user where post code is not null
        return User::with('profile')->whereHas('profile', function ($q) {
            // $q->whereNotNull('post_code');
            $q->wherePostCode(1357);
        })->get()->count();

        // get all user where doesn't have profile
        // return User::doesntHave('profile')->get();

        // return User::whereDoesntHave('profile', function ($query) {
        //     $query->where('name', 'like', '%sha');
        // })->get();

        // create data by relationship
        // return User::find(10)->profile()->create([
        //     'country' => 'BD',
        //     'city' => 'ch',
        // ]);

        $users = User::get();

        // lazy load
        // $users->load('profile');
        return view('oneToOne.index', compact('users'));
    }
}
