<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Review;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Review::class;

    /**
     * Define the model's default state.
     *
     * @return array 'App\Models\Product', 'App\Models\Post'
     */
    public function definition()
    {
        return [
            'reviewable_id' => rand(1, 10),
            'reviewable_type' => rand(1, 2) % 2 == 0 ? 'App\Models\Product' : 'App\Models\Post',
            'user_id' => User::factory(),
            'body' => $this->faker->paragraphs(3, true),
            'is_active' => $this->faker->boolean(90),
        ];
    }
}
