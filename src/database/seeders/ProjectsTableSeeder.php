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
                'name' => 'アジャイルマネジメント',
                'client' => 'Molasoft',
            ],
            [
                'name' => '和泉市生協',
                'client' => 'Molasoft',
            ],
            [
                'name' => 'ドラゴンクエスチョ',
                'client' => 'Sanosoft',
            ],
        ]);
    }
}
