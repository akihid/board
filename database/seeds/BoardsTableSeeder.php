<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class BoardsTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    DB::table('boards')->delete();

    // マークダウン確認用データ（ページネーションも確認したいため３回ループ）
    for ($i = 1; $i <= 3; $i++) {
      $file = new SplFileObject('database/csv/board_seeddata.csv');
      $file->setFlags(
          \SplFileObject::READ_CSV |
          \SplFileObject::READ_AHEAD |
          \SplFileObject::SKIP_EMPTY |
          \SplFileObject::DROP_NEW_LINE
      );

      $is_first = true;

      foreach ($file as $line) {
        $user = App\User::inRandomOrder()->first();

        if ($is_first === true) {
            $is_first = false;
            continue;
        }

        $title = $line[0];
        $body = $line[1];

        App\Board::create([
          'title' => $title,
          'body' => $body,
          'user_id' => $user->id,
        ]);
      }
    }
  }
}