<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class AddRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = [
            [
                'name'          => 'Perpustakaan',
                'guard_name'    => 'web'

            ],
            [
                'name'          => 'PPDB',
                'guard_name'    => 'web'
            ]
        ];

        foreach ($role as $value) {
            Role::create($value);
            $this->command->info('Data Role '.$value['name'].' has been saved.');
        }
    }
}
