<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Unit_pricesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('unit_prices')->insert([
            [
                'yearMonth' => 202006,
                'price' =>2000,
                'user_project_id' =>1
            ],
            [
                'yearMonth' => 202007,
                'price' =>4000,
                'user_project_id' =>1
            ],
            [
                'yearMonth' => 202006,
                'price' =>5000,
                'user_project_id' =>3
            ],
        ]);
    }
}
