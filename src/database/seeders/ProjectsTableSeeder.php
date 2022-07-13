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
                'name' => '請求書システム',
                'photo_path' => '',
                'dead_line' => '2022-07-3',
                'man_hour' => 50,
                'earning' => 800000,
                'expense' => 500000,
                'renewal_date' => '2022-09-05',
                'remark' => '人員不足',
            ],
            [
                'owner_id' => 2,
                'name' => 'ドローンプロジェクト',
                'photo_path' => '',
                'dead_line' => '2022-06-4',
                'man_hour' => 60,
                'earning' => 700000,
                'expense' => 200000,
                'renewal_date' => '2022-04-05',
                'remark' => '人員過多',
            ],
            [
                'owner_id' => 1,
                'name' => '生協プロジェクト',
                'photo_path' => '',
                'dead_line' => '2022-10-3',
                'man_hour' => 70,
                'earning' => 600000,
                'expense' => 400000,
                'renewal_date' => '2022-11-05',
                'remark' => '炎上なう',
            ],
            [
                'owner_id' => 3,
                'name' => 'ちいかわ',
                'photo_path' => '',
                'dead_line' => '2022-2-3',
                'man_hour' => 40,
                'earning' => 500000,
                'expense' => 100000,
                'renewal_date' => '2022-12-16',
                'remark' => 'ワ！ワ！',
            ],
        ]);
    }
}
