<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->delete();
      $faker = Faker::create('ja_JP');
      
      // テストログインユーザー
      App\User::create([
        'name' => 'テストユーザー',
        'email' => 'test@co.jp',
        'password' => Hash::make('password'),
        'detail' => 'テストユーザーです。',
        'avator_url' => 'https://laravel-board-avator.s3.ap-northeast-1.amazonaws.com/ii0Q6HC5kR8HM5I4NOzPkfje0wdF2tE50sdJpNkb.jpeg',
      ]);

      for ($i = 1; $i <= 10; $i++) {
        $name = $faker->name;
        App\User::create([
          'name' => $name,
          'email' => 'ユーザー' . $i . '@co.jp',
          'password' => Hash::make('password'),
          'detail' => $name . 'です',
        ]);
      }
    }
}
