<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Comment;
use App\Models\Article;
class CommentFactory extends Factory
{
    protected $model = Comment::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        if (Article::count() === 0) {
            Article::factory()->create();
        }
        return [
            'subject'=> $this->faker->sentence('3'),
            'body' => $this->faker->paragraph('3', false),
            'article_id' => function () {
                return \App\Models\Article::inRandomOrder()->first()->id;
            },
        ];
    }
}
