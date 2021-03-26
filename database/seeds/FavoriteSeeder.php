<?php

use App\Question;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FavoriteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('favorites')->delete();

        $questions = App\Question::all();
        $users = User::all();

        $users->each(function ($user) use ($questions) {
            $user->favorites()->attach(
                $questions->random(rand(1, $questions->count()))->pluck('id')->toArray()
            );
        });

        // Cara ke 2
        /*  $users = User::pluck('id'); //[1,2,3]
        $numberOfUsers = count($users); // Jumlah user = 3

        $questions = Question::all();
        foreach ($questions as $question) {
            for ($i = 0; $i < rand(1, $numberOfUsers); $i++) {
                $question->favorites()->attach($users[$i]);
            }
        } */
    }
}
