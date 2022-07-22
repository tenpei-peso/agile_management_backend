<?php

declare(strict_types=1);

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
        $this->call([OwnersTableSeeder::class]);
        $this->call([ProjectsTableSeeder::class]);
        $this->call([ProjectUserSeeder::class]);
        $this->call([TimecardsTableSeeder::class]);
        $this->call([BillsTableSeeder::class]);
        $this->call([EarningsTableSeeder::class]);
    }
}
