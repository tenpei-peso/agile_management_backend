<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('details')->insert([
            [
                'user_id' => 1,
                'project_id' => 1,
                'role' => 'バックエンド',
                'unit_price' => 3000,
                'contract_man_hours' => 160,
                'renewal_date' => '2022-07-30',
            ],
            [
                'user_id' => 1,
                'project_id' => 2,
                'role' => 'フロントエンド',
                'unit_price' => 4000,
                'contract_man_hours' => 150,
                'renewal_date' => '2022-08-20',
            ],
            [
                'user_id' => 1,
                'project_id' => 3,
                'role' => 'マネージャー',
                'unit_price' => 5000,
                'contract_man_hours' => 130,
                'renewal_date' => '2022-09-20',
            ],
        ]);
    }
}
