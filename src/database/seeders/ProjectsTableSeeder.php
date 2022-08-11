<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            DB::table('projects')->insert([
            [
                'owner_id' => 1,
                'project_name' => '請求書システム',
                'dead_line' => '2022-10-30',
                'expected_all_operating_time' => 250,
                'earning' => 1000000,
                'contract_expired_date' => '2022-11-25',
                'remark' => '人員不足',
            ],
            [
                'owner_id' => 1,
                'project_name' => 'ドローン監視システム',
                'dead_line' => '2022-11-30',
                'expected_all_operating_time' => 150,
                'earning' => 500000,
                'contract_expired_date' => '2022-12-25',
                'remark' => '人員不足',
            ],
            [
                'owner_id' => 2,
                'project_name' => 'ジブリのシステム',
                'dead_line' => '2022-10-30',
                'expected_all_operating_time' => 20,
                'earning' => 800000,
                'contract_expired_date' => '2022-10-25',
                'remark' => '人員不足',
            ],
            [
                'owner_id' => 3,
                'project_name' => 'トヨタシステム',
                'dead_line' => '2022-10-30',
                'expected_all_operating_time' => 250,
                'earning' => 1000000,
                'contract_expired_date' => '2022-11-25',
                'remark' => '人員不足',
            ],
        ]);
    }
}
