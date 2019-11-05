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
      ]);

      for ($i = 1; $i <= 10; $i++) {
        App\User::create([
          'name' => $faker->name,
          'email' => 'ユーザー' . $i . '@co.jp',
          'password' => Hash::make('password'),
          'detail' => 'ユーザー' . $i . 'です',
        ]);
      }
    }
}
