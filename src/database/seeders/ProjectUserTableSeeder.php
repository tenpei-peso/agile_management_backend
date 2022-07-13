<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('project_user')->insert([
            [
                'project_id' => 1,
                'user_id' => 1
            ],
            [
                'project_id' => 2,
                'user_id' => 1
            ],
            [
                'project_id' => 3,
                'user_id' => 1
            ],
            [
                'project_id' => 4,
                'user_id' => 1
            ],
            
        ]);
    }
}
