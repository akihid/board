<?php

use Illuminate\Database\Seeder;

class LikesTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $boards = App\Board::latest('created_at')->get();
    foreach ($boards as $board) {
      $user = App\User::inRandomOrder()->first();
      App\Like::create([
        'user_id' => $user->id,
        'board_id' => $board->id,
      ]);
    }
  }
}