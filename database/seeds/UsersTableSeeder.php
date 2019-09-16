<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    DB::table('users')->insert([
      [
        'name' => 'Tu Anh',
        'email' => 'tuanh@gmail.com',
        'password' => bcrypt('123456'),
      ],
      [
        'name' => 'Đỗ Văn Bảo',
        'email' => 'baodv@beetechsoft.com',
        'password' => bcrypt('123456'),
      ],[
        'name' => 'Nguyễn Thanh Bình',
        'email' => 'thanhbinhkma27@gmail.com',
        'password' => bcrypt('123456'),
      ],
    ]);
  }
}
