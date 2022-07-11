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
                'yearMonth' => 202207,
                'allCost' => 12000,
                'allOperatingTime' => 2000,
                'allOtherCost' =>3000,
                'sendDone' => false,
                'remarks' =>'何を入れるの',
                'user_project_id' =>1,
            ],
            [
                'yearMonth' => 202206,
                'allCost' => 15000,
                'allOperatingTime' => 4000,
                'allOtherCost' =>5000,
                'sendDone' => false,
                'remarks' =>'確認',
                'user_project_id' =>1,
            ],
            [
                'yearMonth' => 202206,
                'allCost' => 19000,
                'allOperatingTime' => 8000,
                'allOtherCost' =>9000,
                'sendDone' => false,
                'remarks' =>'おはよう',
                'user_project_id' =>2,
            ],
            [
                'yearMonth' => 202207,
                'allCost' => 12000,
                'allOperatingTime' => 2000,
                'allOtherCost' =>3000,
                'sendDone' => false,
                'remarks' =>'何を入れるの',
                'user_project_id' =>2,
            ],
            [
                'yearMonth' => 202208,
                'allCost' => 500000,
                'allOperatingTime' => 4000,
                'allOtherCost' =>3000,
                'sendDone' => false,
                'remarks' =>'ああああ',
                'user_project_id' =>3,
            ],
        ]);
    }
}
