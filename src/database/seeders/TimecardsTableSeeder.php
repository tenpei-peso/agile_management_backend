<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TimecardsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('timecards')->insert([
            [
                'order' => 0,
                'project_user_id' => 1,
                'year_month_day' => "2022-07-11",
                'ticket' => 2,
                'start_time' =>"16:00:00",
                'finish_time' =>"21:00:00",
                'rest_time'=>"01:00",
                'working_time' =>420,
                'expense' =>4000,
                'unit_price' =>2000,
                'remark' =>'交通費',
            ],
            [
                'order' => 0,
                'project_user_id' => 1,
                'year_month_day' => "2022-07-12",
                'ticket' => 2,
                'start_time' =>"11:00:00",
                'finish_time' =>"21:00:00",
                'rest_time'=>"01:00",
                'working_time' =>540,
                'expense' =>5000,
                'unit_price' =>2000,
                'remark' =>'交通費',
            ],
            [
                'order' => 0,
                'project_user_id' => 1,
                'year_month_day' => "2022-07-13",
                'ticket' => 2,
                'start_time' =>"13:00:00",
                'finish_time' =>"18:30:00",
                'rest_time'=>"01:00",
                'working_time' =>270,
                'expense' =>4500,
                'unit_price' =>2000,
                'remark' =>'交通費',
            ],
            [
                'order' => 1,
                'project_user_id' => 1,
                'year_month_day' => "2022-07-13",
                'ticket' => 4,
                'start_time' =>"13:00:00",
                'finish_time' =>"18:30:00",
                'rest_time'=>"01:00",
                'working_time' =>270,
                'expense' =>4500,
                'unit_price' =>2000,
                'remark' =>'交通費',
            ],
            [
                'order' => 0,
                'project_user_id' => 2,
                'year_month_day' => "2022-07-15",
                'ticket' => 4,
                'start_time' =>"11:00:00",
                'finish_time' =>"18:30:00",
                'rest_time'=>"01:00",
                'working_time' =>390,
                'expense' =>4500,
                'unit_price' =>2000,
                'remark' =>'交通費',
            ],
            [
                'order' => 0,
                'project_user_id' => 3,
                'year_month_day' => "2022-07-16",
                'ticket' => 6,
                'start_time' =>"13:00:00",
                'finish_time' =>"18:30:00",
                'rest_time'=>"01:00",
                'working_time' =>270,
                'expense' =>4500,
                'unit_price' =>2000,
                'remark' =>'交通費',
            ],
            [
                'order' => 1,
                'project_user_id' => 4,
                'year_month_day' => "2022-07-16",
                'ticket' => 7,
                'start_time' =>"15:00:00",
                'finish_time' =>"19:30:00",
                'rest_time'=>"01:00",
                'working_time' =>210,
                'expense' =>3500,
                'unit_price' =>2000,
                'remark' =>'交通費',
            ],
            [
                'order' => 0,
                'project_user_id' => 3,
                'year_month_day' => "2022-07-19",
                'ticket' => 7,
                'start_time' =>"15:00:00",
                'finish_time' =>"19:30:00",
                'rest_time'=>"01:00",
                'working_time' =>210,
                'expense' =>3500,
                'unit_price' =>2000,
                'remark' =>'交通費',
            ],
            [
                'order' => 0,
                'project_user_id' => 3,
                'year_month_day' => "2022-08-19",
                'ticket' => 7,
                'start_time' =>"15:00:00",
                'finish_time' =>"19:30:00",
                'rest_time'=>"01:00",
                'working_time' =>210,
                'expense' =>3500,
                'unit_price' =>2000,
                'remark' =>'交通費',
            ],
        ]);
    }
}
