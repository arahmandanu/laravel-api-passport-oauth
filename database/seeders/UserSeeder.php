<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::firstOrCreate(
            ['email' => 'local@mail.com'],
            ['name' => 'Adrian Rahmandanu', 'password' => bcrypt('123456')]
        );
    }
}
