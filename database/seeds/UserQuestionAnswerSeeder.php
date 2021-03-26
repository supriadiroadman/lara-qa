<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserQuestionAnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        DB::table('answers')->delete();
        DB::table('questions')->delete();

        factory(App\User::class, 3)->create()->each(function ($user) { // make 3 user
            $user->questions()->saveMany(
                factory(App\Question::class, rand(1, 5))->make() // make many question for each user
            )->each(function ($q) {
                $q->answers()->saveMany(
                    factory(App\Answer::class, rand(1, 5))->make() // make many answer for each question
                );
            });
        });
    }
}
