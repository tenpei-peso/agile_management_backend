<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([UsersTableSeeder::class]);
        $this->call([ProjectsTableSeeder::class]);
        $this->call([UsersProjectsTableSeeder::class]);
        $this->call([BillsTableSeeder::class]);
        $this->call([ContractsTableSeeder::class]);
        $this->call([TimecardsTableSeeder::class]);
        $this->call([Unit_pricesTableSeeder::class]);
    }
}
