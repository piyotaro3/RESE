<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Reserve;

class ReserveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Reserve::create([
            'user_id' => '1',
            'shop_id' => '3',
            'number' => '5',
            'day' => '2023-07-07',
            'time' => '00:00'
        ]);

        Reserve::create([
            'user_id' => '1',
            'shop_id' => '3',
            'number' => '5',
            'day' => '2023-07-04',
            'time' => '21:00'
        ]);

        Reserve::create([
            'user_id' => '2',
            'shop_id' => '5',
            'number' => '8',
            'day' => '2023-07-09',
            'time' => '00:00'
        ]);

        Reserve::create([
            'user_id' => '1',
            'shop_id' => '5',
            'number' => '7',
            'day' => '2023-07-17',
            'time' => '00:00'
        ]);

        Reserve::create([
            'user_id' => '2',
            'shop_id' => '5',
            'number' => '7',
            'day' => '2023-07-17',
            'time' => '22:00'
        ]);

        Reserve::create([
            'user_id' => '2',
            'shop_id' => '7',
            'number' => '6',
            'day' => '2023-07-017',
            'time' => '15:00'
        ]);

        Reserve::create([
            'user_id' => '1',
            'shop_id' => '8',
            'number' => '11',
            'day' => '2023-07-31',
            'time' => '17:00'
        ]);

        Reserve::create([
            'user_id' => '1',
            'shop_id' => '2',
            'number' => '5',
            'day' => '2023-08-05',
            'time' => '18:00'
        ]);

        Reserve::create([
            'user_id' => '2',
            'shop_id' => '15',
            'number' => '3',
            'day' => '2023-08-05',
            'time' => '18:00'
        ]);

        Reserve::create([
            'user_id' => '1',
            'shop_id' => '5',
            'number' => '3',
            'day' => '2023-08-08',
            'time' => '21:00'
        ]);

        Reserve::create([
            'user_id' => '2',
            'shop_id' => '5',
            'number' => '8',
            'day' => '2023-08-09',
            'time' => '22:00'
        ]);
    }
}
