<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BillsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bills')->insert([
            [
                'project_user_id' => 1,
                'project_id' => 1,
                'year_month' => '2022-07',
                'unit_price' => 20000,
                'month_all_cost' => 123000,
                'month_operating_time' => 3600,
                'month_other_cost' =>3000,
                'send_done' => false,
            ],
            [
                'project_user_id' => 1,
                'project_id' => 1,
                'year_month' => '2022-08',
                'unit_price' => 4000,
                'month_all_cost' => 283000,
                'month_operating_time' => 4200,
                'month_other_cost' =>3000,
                'send_done' => false,
            ],
            [
                'project_user_id' => 1,
                'project_id' => 1,
                'year_month' => '2022-09',
                'unit_price' => 4000,
                'month_all_cost' => 204000,
                'month_operating_time' => 3000,
                'month_other_cost' =>4000,
                'send_done' => false,
            ],
            [
                'project_user_id' => 2,
                'project_id' => 2,
                'year_month' => '2022-07',
                'unit_price' => 40000,
                'month_all_cost' => 283000,
                'month_operating_time' => 4200,
                'month_other_cost' =>3000,
                'send_done' => false,
            ],
            [
                'project_user_id' => 3,
                'project_id' => 1,
                'year_month' => '2022-09',
                'unit_price' => 5000,
                'month_all_cost' => 24000,
                'month_operating_time' => 240,
                'month_other_cost' =>4000,
                'send_done' => false,
            ],
            [
                'project_user_id' => 5,
                'project_id' => 1,
                'year_month' => '2022-08',
                'unit_price' => 2000,
                'month_all_cost' => 404000,
                'month_operating_time' => 200,
                'month_other_cost' =>4000,
                'send_done' => false,
            ],
        ]);
    }
}
