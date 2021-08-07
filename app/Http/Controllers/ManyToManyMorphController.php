<?php

namespace App\Http\Controllers;

use App\Models\Keyword;
use App\Models\Post;
use App\Models\Product;
use Illuminate\Http\Request;

class ManyToManyMorphController extends Controller
{
    public function index()
    {
        # insert
        //Product::find(1)->keywords()->attach([1, 2, 3]);

        #
 
        return view('many-to-many.morph');
    }
}
