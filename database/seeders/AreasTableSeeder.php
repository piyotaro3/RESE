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
            'name' => '東京'
        ];
        Area::create($param);
        $param = [
            'id' => '2',
            'name' => '大阪',
        ];
        Area::create($param);
        $param = [
            'id' => '3',
            'name' => '福岡',
        ];
        Area::create($param);
    }
}
