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
        User::create([
            'name' => 'admin',
            'email' => 'admin@astra-visteon.com',
            'password' => bcrypt('AVI2022'),
            'role' => 'admin'
        ]);

        User::create([
            'name' => 'user',
            'email' => 'user@astra-visteon.com',
            'password' => bcrypt('AVI2022'),
            'role' => 'user'
        ]);
    }
}
