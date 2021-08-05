<?php

namespace Database\Seeders;

use App\Models\City;
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
        \App\Models\User::factory(10)->create();

        $this->call([
            ProfileSeeder::class,
            PostSeeder::class,
            CommentSeeder::class,
            SkillSeeder::class
        ]);
        City::factory(15)->create();
    }
}
