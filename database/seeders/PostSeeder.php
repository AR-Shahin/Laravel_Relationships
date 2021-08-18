<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 5; $i++) {
            Post::create([
                'user_id' => rand(1, 5),
                'title' => Str::random(),
                'view' => $i % 2 == 0 ? rand(10, 80) : null,
                'status' => $i % 5 == 0 ? true : false,
                'price' => rand(100, 1000) / 10
            ]);
        }
    }
}
