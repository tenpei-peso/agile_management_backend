<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EarningsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('earnings')->insert([
            [
                'year_month' => '2022-08',
                'earning' => 2000000,
                'project_id' =>1,
            ],
            [
                'year_month' => '2022-08',
                'earning' => 5000000,
                'project_id' =>3,
            ],
            [
                'year_month' => '2022-08',
                'earning' => 3000000,
                'project_id' =>2,
            ],
            [
                'year_month' => '2022-09',
                'earning' => 3000000,
                'project_id' =>2,
            ],
        ]);
    }
}
