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
        $this->call(LaratrustSeeder::class);
        $this->call(UserSeed::class);
        $this->call(JenisKegiatanSeeder::class);
        $this->call(RoleUpdateSeeder::class);
    }
}
