<?php

use Illuminate\Database\Seeder;

class CoresUsersTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cores_users')->truncate();
        DB::table('cores_users')->insert([
            'name' => 'admin',
            'email' => 'phamvanhuong.hd@gmail.com',
            'password' => bcrypt('123456')
        ]);
    }

}
