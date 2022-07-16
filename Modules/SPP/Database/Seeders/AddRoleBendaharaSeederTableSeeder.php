<?php

namespace Modules\SPP\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role;

class AddRoleBendaharaSeederTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $role = Role::create([
        'name'  => 'Bendahara',
        'guard_name'  => 'web'
      ]);

      $this->command->info('Data Role '.$role['name'].' has been saved.');
    }
}
