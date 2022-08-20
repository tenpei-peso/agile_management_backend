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
                'category_id' => 1,
                'name' => 'DB設計',
            ],
            [
                'category_id' => 3,
                'name' => 'フロントエンドエンジニア',
            ],
            [
                'category_id' => 3,
                'name' => 'バックエンドエンジニア',
            ],
            [
                'category_id' => 3,
                'name' => 'サーバーサイドエンジニア',
            ],
            
        ]);
    }
}
