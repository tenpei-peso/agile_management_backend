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
                'project_id' =>1,
                'user_id' =>1,
                'year_month' => '2022-07',
                'all_cost' => 120000,
                'all_operating_time' => 6000,
                'all_other_cost' =>3000,
                'send_done' => false,
            ],
            [
                'project_id' =>1,
                'user_id' =>1,
                'year_month' => '2022-08',
                'all_cost' => 140000,
                'all_operating_time' => 7000,
                'all_other_cost' =>3000,
                'send_done' => false,
            ],
            [
                'project_id' =>1,
                'user_id' =>1,
                'year_month' => '2022-09',
                'all_cost' => 150000,
                'all_operating_time' => 5000,
                'all_other_cost' =>4000,
                'send_done' => false,
            ],
            [
                'project_id' =>2,
                'user_id' =>1,
                'year_month' => '2022-07',
                'all_cost' => 150000,
                'all_operating_time' => 5000,
                'all_other_cost' =>4000,
                'send_done' => false,
            ],
            [
                'project_id' =>1,
                'user_id' =>2,
                'year_month' => '2022-09',
                'all_cost' => 150000,
                'all_operating_time' => 5000,
                'all_other_cost' =>4000,
                'send_done' => false,
            ],
        ]);
    }
}
