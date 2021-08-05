<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ManyToManyController extends Controller
{
    public function index()
    {
        # Single attach
        // return User::find(5)->skills()->attach(
        //     2,
        //     ['rate' => 50]

        // );

        # Multiple attach
        // return User::find(1)->skills()->attach(
        //     [
        //         3 => ['rate' => 530],
        //         4 => ['rate' => 150],
        //     ]

        // );

        # Single Detach
        // return User::find(5)->skills()->detach(2);

        # Multiple Detach
        // return User::find(5)->skills()->detach([3, 4]);

        # Sync -> jeta thake oita rakhe baki ghula delete r new asle add kore
        // return User::find(5)->skills()->sync([5, 2, 1]);

        # Sync
        // return User::find(5)->skills()->sync([5 => ['rate' => 159], 2, 1 => ['rate' => 963]]);

        # Toggle -> jeta thake na oita add kore baki ghula delete kore and new add kore na
        // return User::find(5)->skills()->toggle([1, 3, 5]);


        $users = User::has('skills')->with('skills')->get();
        return view('many-to-many.index', compact('users'));
    }
}
