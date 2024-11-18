<?php

namespace Database\Factories;

use App\Models\Question;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Question>
 */
class QuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Question::class;
    public function definition(): array
    {

        return [
            'title' => rtrim(fake()->sentence(round(5, 10)), "."),
            'body' => fake()->paragraph(round(3, 7), true),
            'views' => rand(8, 10),
            'answer' => rand(6, 10),
            'votes' => rand(-3, 10)
        ];
    }
}
