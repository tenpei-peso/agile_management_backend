<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectsUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('projects_users')->insert([
            [
                'project_id' => 1,
                'user_id' => 1,
                'role' => 'テスト',
                'expected_operating_time' => 500,
                'unit_price' => 3000,
                'bill_send_date' => 20,
                'contract_pdf_path' => 'asdfasdf.pdf',
                'user_contract_date' => "2022-04-01",
                'user_expired_date' => "2023-03-31",

            ],
            [
                'project_id' => 2,
                'user_id' => 1,
                'role' => 'テスト',
                'expected_operating_time' => 600,
                'unit_price' => 4000,
                'bill_send_date' => 10,
                'contract_pdf_path' => 'asdfasdf.pdf',
                'user_contract_date' => "2022-08-01",
                'user_expired_date' => "2024-06-30",
            ],
            [
                'project_id' => 1,
                'user_id' => 2,
                'role' => 'テスト',
                'expected_operating_time' => 200,
                'unit_price' => 2000,
                'bill_send_date' => 20,
                'contract_pdf_path' => 'asdfasdf.pdf',
                'user_contract_date' => "2022-04-01",
                'user_expired_date' => "2024-03-31",
            ],
            [
                'project_id' => 4,
                'user_id' => 1,
                'role' => 'テスト',
                'expected_operating_time' => 100,
                'unit_price' => 5000,
                'bill_send_date' => 20,
                'contract_pdf_path' => 'asdfasdf.pdf',
                'user_contract_date' => "2021-04-01",
                'user_expired_date' => "2025-03-31",
            ],
        ]);
    }
}
