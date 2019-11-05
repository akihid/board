<?php

use Illuminate\Database\Seeder;

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
        '見出しのサンプル' => <<< EOF
          # 見出し1
          ## 見出し2
          ### 見出し3
          #### 見出し4
          ##### 見出し5
        EOF
        ,
        '箇条書きリスト' => <<< EOF
          - リスト1
            - ネスト リスト1_1
              - ネスト リスト1_1_1
              - ネスト リスト1_1_2
            - ネスト リスト1_2
          - リスト2
          - リスト3
        EOF
        ,
        'シンタックスハイライト' => <<< EOF
          ```ruby
          　class Hoge
          　  def hoge
          　    print 'hoge'
          　  end
          　end
          ```
        EOF
        ,
        'インライン表示' => <<< EOF
          `インライン表示`
          ふつうのテキスト
        EOF
        ,
        'リンクの表示' => <<< EOF
          [Qiita](http://qiita.com/)
        EOF
        ,
        '太字とか斜体とか' => <<< EOF
          **テキスト**
          *テキスト*
          ~~テキスト~~
          ***
        EOF
      );
      foreach ($data as $key => $value) {
        $user = App\User::inRandomOrder()->first();
        App\Board::create([
          'title' => $key,
          'body' => $value,
          'user_id' => $user->id,
        ]);
      }
    }
}
