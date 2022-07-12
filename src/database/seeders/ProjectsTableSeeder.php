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
                'owner_name' => 'Molasoft',
                'name' => '請求書システム',
                'photo_path' => '',
                'dead_line' => '2022-07-3',
                'man_hour' => 50,
                'earning' => 800000,
                'expense' => 500000,
                'renewal_date' => '2022-09-05',
                'remark' => '人員不足',
            ],
        ]);
    }
}
