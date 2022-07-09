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
                'dateTimeId' => '20220405',
                'order' =>'1',
                'ticketNumber' =>'2',
                'startTime' =>"16:00:00",
                'endTime' =>"21:00:00",
                'breakTime'=>300,
                'otherCost' =>4000,
                'costDetail' =>'交通費',
                'user_project_id' =>'1',
            ],
            [
                'dateTimeId' => '20220406',
                'order' =>'1',
                'ticketNumber' =>'2',
                'startTime' =>"16:00:00",
                'endTime' =>"21:00:00",
                'breakTime'=>300,
                'otherCost' =>4000,
                'costDetail' =>'交通費',
                'user_project_id' => 2,
            ],
            [
                'dateTimeId' => '20220407',
                'order' =>'1',
                'ticketNumber' =>'2',
                'startTime' =>"16:00:00",
                'endTime' =>"21:00:00",
                'breakTime'=>300,
                'otherCost' =>4000,
                'costDetail' =>'交通費',
                'user_project_id' => 3,
            ],
        ]);
    }
}
