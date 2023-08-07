<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
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
            'name' => 'UserName',
            'email' => 'User@test.com',
            'password' => bcrypt('12345678'),
        ]);

        DB::table('users')->insert([
            'name' => '田中太郎',
            'email' => 'Tanaka@test.com',
            'password' => bcrypt('87654321'),
        ]);
    }
}
