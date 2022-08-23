<?php

declare(strict_types=1);

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
                'year_month' => '202207',
                'month_all_cost' => 123000,
                'month_working_time' => 3600,
                'month_other_cost' =>3000,
                'send_done' => false,
            ],
            [
                'project_user_id' => 1,
                'project_id' => 1,
                'year_month' => '202208',
                'month_all_cost' => 283000,
                'month_working_time' => 4200,
                'month_other_cost' =>3000,
                'send_done' => false,
            ],
            [
                'project_user_id' => 1,
                'project_id' => 1,
                'year_month' => '202209',
                'month_all_cost' => 204000,
                'month_working_time' => 3000,
                'month_other_cost' =>4000,
                'send_done' => false,
            ],
            [
                'project_user_id' => 2,
                'project_id' => 2,
                'year_month' => '202207',
                'month_all_cost' => 283000,
                'month_working_time' => 4200,
                'month_other_cost' =>3000,
                'send_done' => false,
            ],
            [
                'project_user_id' => 3,
                'project_id' => 1,
                'year_month' => '202209',
                'month_all_cost' => 24000,
                'month_working_time' => 2400,
                'month_other_cost' =>4000,
                'send_done' => false,
            ],
            [
                'project_user_id' => 5,
                'project_id' => 1,
                'year_month' => '202208',
                'month_all_cost' => 404000,
                'month_working_time' => 200,
                'month_other_cost' =>4000,
                'send_done' => false,
            ],
        ]);
    }
}
