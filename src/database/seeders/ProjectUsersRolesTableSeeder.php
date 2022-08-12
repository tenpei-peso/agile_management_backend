<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectUsersRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('project_users_roles')->insert([
            [
                'project_users_id' => 1,
                'role_id' => 1,
            ],
            [
                'project_users_id' => 1,
                'role_id' => 2,
            ],
            [
                'project_users_id' => 2,
                'role_id' => 3,
            ],
            [
                'project_users_id' => 3,
                'role_id' => 4,
            ],
            [
                'project_users_id' => 3,
                'role_id' => 3,
            ],
            
        ]);
    }
}
