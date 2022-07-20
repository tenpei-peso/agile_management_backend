<?php

declare(strict_types=1);

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
                'name' => '請求書システム',
                'expected_all_operating_time' => 30,
                'product_deadline' => '2022-09-05',
                'bill_deadline' => 25,
                'remark' => '人員不足',
                'contract_expired_date' => '2022-11-25',
            ],
            [
                'owner_id' => 1,
                'name' => '漫画システム',
                'expected_all_operating_time' => 24,
                'product_deadline' => '2022-08-09',
                'bill_deadline' => 25,
                'remark' => 'やる気不足',
                'contract_expired_date' => '2022-11-25',
            ],
            [
                'owner_id' => 2,
                'name' => 'ドローンシステム',
                'expected_all_operating_time' => 30,
                'product_deadline' => '2023-11-26',
                'bill_deadline' => 25,
                'remark' => '技術力不足',
                'contract_expired_date' => '2023-12-25',
            ],
            [
                'owner_id' => 3,
                'name' => 'カラオケシステム',
                'expected_all_operating_time' => 30,
                'product_deadline' => '2022-09-05',
                'bill_deadline' => 25,
                'remark' => '人員不足',
                'contract_expired_date' => '2022-05-05',
            ],
        ]);
    }
}
