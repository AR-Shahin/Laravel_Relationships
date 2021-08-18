<?php

namespace Database\Seeders;

use App\Models\Profile;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;


class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 5; $i++) {
            Profile::create([
                'user_id' => $i,
                'country' => ucwords(Str::random(5)),
                'city' => ucwords(Str::random(5)),
                'post_code' => $i % 2 == 0 ? rand(100, 5000) : null
            ]);
        }
    }
}
