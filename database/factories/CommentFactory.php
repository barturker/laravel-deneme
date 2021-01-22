<?php

namespace Database\Factories;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Models\BlogPost;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;
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
     * /** @var \Illuminate\Database\Eloquent\Factory $factory */

    public function definition()
    {
      $commentableType = (['App\Models\User', 'App\Models\BlogPost']);
      $commentableId = ([User::all()->random()->id , BlogPost::all()->random()->id]);
        return [
          'user_id' => User::all()->random()->id,
          'commentable_type' => $commentableType,
          'commentable_id' => $commentableId,
          'content' => $this->faker->text,
          'created_at' =>$this->faker->dateTimeBetween($startDate = '-3 months', $endDate = 'now'),
        ];
    }

}
