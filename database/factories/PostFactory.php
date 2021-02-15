<?php

namespace Database\Factories;

use App\Models\{Post, User};
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory()->create(),
            'title' => Str::title($this->faker->sentence()),
            'slug' => $this->faker->slug(),
            'body' => $this->faker->sentence(),
            'status' => Arr::random(['published', 'draft']),
        ];
    }
}
