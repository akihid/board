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
      for ($i = App\Board::first()->id; $i <= App\Board::orderBy('id', 'DESC')->first()->id; $i++) {
        $user = App\User::inRandomOrder()->first();
        App\Like::create([
          'user_id' => $user->id,
          'board_id' => $i,
        ]);
      }
    }
}
