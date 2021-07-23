<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 150; $i++) {
            Comment::create([
                'user_id' => rand(1, 10),
                'post_id' => rand(1, 50),
                'title' => Str::random(),
                'status' => ($i % 5 || $i % 3) == 0 ? true : false,
            ]);
        }
    }
}
