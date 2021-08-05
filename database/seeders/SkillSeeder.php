<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $skills = ['WEB', 'GRAPHIC', 'VIDEO', 'CODE', 'ART'];
        for ($i = 0; $i < count($skills); $i++) {
            Skill::create([
                'name' => $skills[$i]
            ]);
        }
    }
}
