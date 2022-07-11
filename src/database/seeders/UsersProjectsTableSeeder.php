<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users_projects')->insert([
            [
                'project_id' =>1,
                'user_id' =>1,
            ],
            [
                'project_id' =>1,
                'user_id' =>2,
            ],
            [
                'project_id' =>2,
                'user_id' =>3,
            ],
        ]);
    }
}
