<?php

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
                'id' =>  202207010101,
                'user_id' => 1,
                'project_id' => 1,
                'year_month' =>'2022-07',
                'day' => 1,
                'start_time' =>"16:00:00",
                'finish_time' =>"21:00:00",
                'rest_time'=>1,
                'expenses' =>4000,
                'remark' =>'交通費',
            ],
            [
                'id' =>  202207020101,
                'user_id' => 1,
                'project_id' => 1,
                'year_month' =>'2022-07',
                'day' => 2,
                'start_time' =>"11:00:00",
                'finish_time' =>"21:00:00",
                'rest_time'=>1,
                'expenses' =>5000,
                'remark' =>'交通費',
            ],
            [
                'id' =>  202207030101,
                'user_id' => 1,
                'project_id' => 1,
                'year_month' =>'2022-07',
                'day' => 3,
                'start_time' =>"13:00:00",
                'finish_time' =>"18:30:00",
                'rest_time'=>1,
                'expenses' =>4500,
                'remark' =>'交通費',
            ],
            [
                'id' =>  202207030102,
                'user_id' => 1,
                'project_id' => 2,
                'year_month' =>'2022-07',
                'day' => 3,
                'start_time' =>"13:00:00",
                'finish_time' =>"18:30:00",
                'rest_time'=>1,
                'expenses' =>4500,
                'remark' =>'交通費',
            ],
            [
                'id' =>  202207040102,
                'user_id' => 1,
                'project_id' => 1,
                'year_month' =>'2022-07',
                'day' => 4,
                'start_time' =>"11:00:00",
                'finish_time' =>"18:30:00",
                'rest_time'=>1,
                'expenses' =>4500,
                'remark' =>'交通費',
            ],
            [
                'id' =>  202207030103,
                'user_id' => 1,
                'project_id' => 3,
                'year_month' =>'2022-07',
                'day' => 3,
                'start_time' =>"13:00:00",
                'finish_time' =>"18:30:00",
                'rest_time'=>1,
                'expenses' =>4500,
                'remark' =>'交通費',
            ],
        ]);
    }
}
