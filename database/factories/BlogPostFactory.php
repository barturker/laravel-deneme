<?php

namespace Database\Factories;

use App\Models\BlogPost;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class BlogPostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BlogPost::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id'=>User::all()->random()->id,
            'title' => $this->faker->company,
            'content' => $this->faker->paragraphs(rand(10,15), true),
            'created_at' =>$this->faker->dateTimeBetween($startDate = '-3 months', $endDate = 'now'),
        ];
    }
}
