<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // \App\Models\User::factory()->count(10)->create()->each(function ($u) {
        //     $u->questions()
        //       ->saveMany(
        //           \App\Models\Question::factory()->count(rand(1, 3))->make()
        //       )->each(function ($q) {
        //           $q->answers()
        //             ->saveMany(
        //                 \App\Models\Answer::factory()->count(rand(1, 3))->make()
        //             );
        //       });
        // });
        $this->call([
            UsersQuestionsAnswersTableSeeder::class,
            FavoritesTableSeeder::class,
            VotablesTableSeeder::class,
        ]) ;
    }
}
