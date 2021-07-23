<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class OneToManyController extends Controller
{
    public function oneToMany()
    {

        // $posts = Post::with('comments', 'user')->get();
        return view('oneToMany.index', compact('posts'));
    }
}
