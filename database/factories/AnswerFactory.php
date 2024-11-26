<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Answer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Answer>
 */
class AnswerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Answer::class;
    public function definition(): array
    {
        return [
            'body' => fake()->paragraph(rand(3, 7), true),
            'user_id' => fake()->randomElement(User::pluck('id')),
            'votes_count' => rand(0, 5)
        ];
    }
}
