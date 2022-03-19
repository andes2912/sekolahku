<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name'      => 'Kepala Sekolah',
                'username'  => 'kepsek',
                'email'     => 'kepsek@sch.id',
                'role'      => 'Admin',
                'status'    => 'Aktif',
                'password'  => bcrypt('Bismillah')

            ],
            [
                'name'      => 'Andri Desmana',
                'username'  => 'andes',
                'email'     => 'andri@sch.id',
                'role'      => 'Guru',
                'status'    => 'Aktif',
                'password'  => bcrypt('Bismillah')

            ],
            [
                'name'      => 'Annisa Wahyuni',
                'username'  => 'annisa',
                'email'     => 'annisa@sch.id',
                'role'      => 'Murid',
                'status'    => 'Aktif',
                'password'  => bcrypt('Bismillah')

            ]
        ];

        User::truncate();
        foreach ($user as $value) {
            User::create($value);
            $this->command->info('Data User '.$value['name'].' has been saved.');
        }
    }
}
