<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\User;
use App\Models\Answer;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Question;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([
            UsersQuestionsAnswersTableSeeder::class,
            FavoritesTableSeeder::class,
            VotablesTableSeeder::class,
        ]);

        // $user = User::factory(4)
        //     ->has(Question::factory(count: 3)
        //         ->has(Answer::factory(count: 5), 'answers'), 'questions')
        //     ->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
