<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ValidationController extends Controller
{
    function create()
    {
        return view('validation.index');
    }
}
