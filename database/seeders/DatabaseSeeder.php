<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\SPP\Database\Seeders\AddRoleBendaharaSeederTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
           RoleSeeder::class,
           AddRoleSeeder::class,
           UserSeeder::class,
           AddRoleBendaharaSeederTableSeeder::class,
           IndoBankSeeder::class,
           SettingSeeder::class
        ]);

    }
}
