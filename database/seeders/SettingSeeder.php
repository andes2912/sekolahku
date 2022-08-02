<?php

namespace Database\Seeders;

use App\Models\Setting;
use App\Models\User;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('role','Admin')->first();
        Setting::create([
            'isEmail'   => false,
            'user_id'   => $user->id
        ]);

        $this->command->info('Data Setting has been saved.');
    }
}
