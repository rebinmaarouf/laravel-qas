<?php

namespace Database\Seeders;

use App\Models\Answer;
use App\Models\User;
use App\Models\Question;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class VotablesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('votables')->delete();
        $users = User::all();
        $numberofUsers = count($users);
        $votes = [-1, 1];
        foreach (Question::all() as $question) {
            for ($i = 0; $i < rand(1, $numberofUsers); $i++) {
                $user = $users[$i];

                $user->voteQuestion($question, $votes[rand(0, 1)]);
            }
        }
        foreach (Answer::all() as $answer) {
            for ($i = 0; $i < rand(1, $numberofUsers); $i++) {
                $user = $users[$i];

                $user->voteAnswer($answer, $votes[rand(0, 1)]);
            }
        }
    }
}
