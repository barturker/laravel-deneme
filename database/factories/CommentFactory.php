<?php

namespace Database\Factories;

use App\Models\BlogPost;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'blog_post_id' => BlogPost::all()->random()->id,
            'user_id' => User::all()->random()->id,
            'content' => $this->faker->text,
            'created_at' =>$this->faker->dateTimeBetween($startDate = '-3 months', $endDate = 'now'),
        ];
    }
}
