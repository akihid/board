<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker::create('ja_JP');

      $boards = App\Board::latest('created_at')->get();
      foreach ($boards as $board) {
        $user = App\User::inRandomOrder()->first();
        App\Comment::create([
          'body' => $faker->realText(20),
          'user_id' => $user->id,
          'board_id' => $board->id,
        ]);
      }
    }
}
