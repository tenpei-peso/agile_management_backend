<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContractsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contracts')->insert([
            [
                'pdf' => '1234.jpg' ,
                'contractDate' => "2018-05-15",
                'expiredDate' => "2022-05-15",
                'user_project_id' =>1,
            ],
            [
                'pdf' => '2345.jpg' ,
                'contractDate' => "2017-06-15",
                'expiredDate' => "2025-08-15",
                'user_project_id' =>1,
            ],
            [
                'pdf' => '3456.jpg' ,
                'contractDate' => "2019-05-15",
                'expiredDate' => "2025-05-15",
                'user_project_id' =>2,
            ],
            [
                'pdf' => '5678.jpg',
                'contractDate' => "2020-05-15",
                'expiredDate' => "2026-05-15",
                'user_project_id' =>2,
            ],
            [
                'pdf' => '6789.jpg',
                'contractDate' => "2021-05-15",
                'expiredDate' => "2025-05-15",
                'user_project_id' =>3,
            ],
        ]);
    }
}
