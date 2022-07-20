<?php

declare(strict_types=1);

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
                'year_month' => 202209,
                'earning' => 2000000,
                'project_id' =>1,
            ],
            [
                'year_month' => 202209,
                'earning' => 5000000,
                'project_id' =>3,
            ],
            [
                'year_month' => 202210,
                'earning' => 3000000,
                'project_id' =>2,
            ],
            [
                'year_month' => 202210,
                'earning' => 3000000,
                'project_id' =>2,
            ],
        ]);
    }
}
