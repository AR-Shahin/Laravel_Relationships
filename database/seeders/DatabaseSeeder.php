<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Product;
use App\Models\Review;
use App\Models\User;
use Database\Factories\CityFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'password' => bcrypt('password'),
            'role' => 'admin'
        ]);
        User::create([
            'name' => 'User',
            'email' => 'user@mail.com',
            'password' => bcrypt('password'),
            'role' => 'user'
        ]);
        User::create([
            'name' => 'Visitor',
            'email' => 'visitor@mail.com',
            'password' => bcrypt('password'),
            'role' => 'visitor'
        ]);
        \App\Models\User::factory(10)->create();

        $this->call([
            ProfileSeeder::class,
            PostSeeder::class,
            CommentSeeder::class,
            SkillSeeder::class
        ]);
        City::factory(15)->create();
        Product::factory(10)->create();
        Review::factory(20)->create();
    }
}
