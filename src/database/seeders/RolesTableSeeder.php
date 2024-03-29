<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [
                'project_id' => 1,
                'name' => 'DB設計',
            ],
            [
                'project_id' => 1,
                'name' => 'フロントエンドエンジニア',
            ],
            [
                'project_id' => 1,
                'name' => 'バックエンドエンジニア',
            ],
            [
                'project_id' => 2,
                'name' => 'サーバーサイドエンジニア',
            ],
            
        ]);
    }
}
