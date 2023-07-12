<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Area;

class AreasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'id' => '1',
            'name' => '東京都'
        ];
        Area::create($param);
        $param = [
            'id' => '2',
            'name' => '大阪府',
        ];
        Area::create($param);
        $param = [
            'id' => '3',
            'name' => '福岡県',
        ];
        Area::create($param);
    }
}
