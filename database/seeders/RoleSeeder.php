<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::firstOrCreate(['name' => 'admin']);
        $reguler = Role::firstOrCreate(['name' => 'reguler']);
        $staff = Role::firstOrCreate(['name' => 'staff']);
    }
}
