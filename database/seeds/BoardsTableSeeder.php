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

    $data = array(
      '見出しのサンプル' => <<<EOF
        # 見出し1
        ## 見出し2
        ### 見出し3
        #### 見出し4
        ##### 見出し5
      EOF
      ,
      '箇条書きリスト' => <<<EOF
        - リスト1
          - ネスト リスト1_1
            - ネスト リスト1_1_1
            - ネスト リスト1_1_2
          - ネスト リスト1_2
        - リスト2
        - リスト3
      EOF
      ,
      'シンタックスハイライト' => <<<EOF
        ```ruby
        　class Hoge
        　  def hoge
        　    print 'hoge'
        　  end
        　end
        ```
      EOF
      ,
      'インライン表示' => <<<EOF
        `インライン表示`
        ふつうのテキスト
      EOF
      ,
      '太字とか斜体とか' => <<<EOF
        **テキスト**
        *テキスト*
        ~~テキスト~~
        ***
      EOF
      ,
    );

    //ページネーション確認用データ
    $faker = Faker::create('ja_JP');
    for ($i = 1; $i <= 10; $i++) {
      $user = App\User::inRandomOrder()->first();
      App\Board::create([
        'title' => $faker->realText(10),
        'body' => $faker->realText(20),
        'user_id' => $user->id,
      ]);
    }

    // // マークダウンデータ
    // foreach ($data as $key => $value) {
    //   $user = App\User::inRandomOrder()->first();
    //   App\Board::create([
    //     'title' => $key,
    //     'body' => $value,
    //     'user_id' => $user->id,
    //   ]);
    // }
  }
}