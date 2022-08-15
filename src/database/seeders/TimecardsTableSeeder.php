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
                'year_month_date' => "2022-07-11",
                'ticket_number' => 2,
                'ticket_name' => 'コロコロAPI実装',
                'start_time' =>"16:00:00",
                'finish_time' =>"21:00:00",
                'rest_time'=>"01:00",
                'operating_time' =>420,
                'expense' =>4000,
                'unit_price' =>2000,
                'remark' =>'交通費',
            ],
            [
                'order' => 0,
                'project_user_id' => 1,
                'year_month_date' => "2022-07-12",
                'ticket_number' => 2,
                'ticket_name' => 'ピロピロ実装',
                'start_time' =>"11:00:00",
                'finish_time' =>"21:00:00",
                'rest_time'=>"01:00",
                'operating_time' =>540,
                'expense' =>5000,
                'unit_price' =>2000,
                'remark' =>'交通費',
            ],
            [
                'order' => 0,
                'project_user_id' => 1,
                'year_month_date' => "2022-07-13",
                'ticket_number' => 2,
                'ticket_name' => 'ピロピロ実装',
                'start_time' =>"13:00:00",
                'finish_time' =>"18:30:00",
                'rest_time'=>"01:00",
                'operating_time' =>270,
                'expense' =>4500,
                'unit_price' =>2000,
                'remark' =>'交通費',
            ],
            [
                'order' => 1,
                'project_user_id' => 1,
                'year_month_date' => "2022-07-13",
                'ticket_number' => 4,
                'ticket_name' => '鶏肉調理',
                'start_time' =>"13:00:00",
                'finish_time' =>"18:30:00",
                'rest_time'=>"01:00",
                'operating_time' =>270,
                'expense' =>4500,
                'unit_price' =>2000,
                'remark' =>'交通費',
            ],
            [
                'order' => 0,
                'project_user_id' => 2,
                'year_month_date' => "2022-07-15",
                'ticket_number' => 4,
                'ticket_name' => '鶏肉調理',
                'start_time' =>"11:00:00",
                'finish_time' =>"18:30:00",
                'rest_time'=>"01:00",
                'operating_time' =>390,
                'expense' =>4500,
                'unit_price' =>2000,
                'remark' =>'交通費',
            ],
            [
                'order' => 0,
                'project_user_id' => 3,
                'year_month_date' => "2022-07-16",
                'ticket_number' => 6,
                'ticket_name' => '鶏肉調理',
                'start_time' =>"13:00:00",
                'finish_time' =>"18:30:00",
                'rest_time'=>"01:00",
                'operating_time' =>270,
                'expense' =>4500,
                'unit_price' =>2000,
                'remark' =>'交通費',
            ],
            [
                'order' => 1,
                'project_user_id' => 4,
                'year_month_date' => "2022-07-16",
                'ticket_number' => 7,
                'ticket_name' => 'ぶた肉調理',
                'start_time' =>"15:00:00",
                'finish_time' =>"19:30:00",
                'rest_time'=>"01:00",
                'operating_time' =>210,
                'expense' =>3500,
                'unit_price' =>2000,
                'remark' =>'交通費',
            ],
            [
                'order' => 0,
                'project_user_id' => 3,
                'year_month_date' => "2022-07-19",
                'ticket_number' => 7,
                'ticket_name' => '肉調理',
                'start_time' =>"15:00:00",
                'finish_time' =>"19:30:00",
                'rest_time'=>"01:00",
                'operating_time' =>210,
                'expense' =>3500,
                'unit_price' =>2000,
                'remark' =>'交通費',
            ],
            [
                'order' => 0,
                'project_user_id' => 3,
                'year_month_date' => "2022-08-19",
                'ticket_number' => 7,
                'ticket_name' => '肉調理',
                'start_time' =>"15:00:00",
                'finish_time' =>"19:30:00",
                'rest_time'=>"01:00",
                'operating_time' =>210,
                'expense' =>3500,
                'unit_price' =>2000,
                'remark' =>'交通費',
            ],
        ]);
    }
}
