<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Answer;
use App\Models\Question;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersQuestionsAnswersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->delete();
        DB::table('questions')->delete();
        DB::table('answers')->delete();
        $user = User::factory(4)
            ->has(Question::factory(count: 3)
                ->has(Answer::factory(count: 5), 'answers'), 'questions')
            ->create();
    }
}
