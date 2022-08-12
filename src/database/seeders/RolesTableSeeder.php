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
                'categories_id' => 1,
                'name' => 'DB設計',
            ],
            [
                'categories_id' => 3,
                'name' => 'フロントエンドエンジニア',
            ],
            [
                'categories_id' => 3,
                'name' => 'バックエンドエンジニア',
            ],
            [
                'categories_id' => 3,
                'name' => 'サーバーサイドエンジニア',
            ],
            
        ]);
    }
}
