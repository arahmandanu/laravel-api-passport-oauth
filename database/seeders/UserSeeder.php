<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::firstOrCreate(
            ['email' => 'local@mail.com'],
            ['id' => Str::uuid(), 'name' => 'Adrian Rahmandanu', 'password' => bcrypt('123456')]
        );

        if (!$user->hasRole('admin')) {
            $user->assignRole('admin');
        }
    }
}
