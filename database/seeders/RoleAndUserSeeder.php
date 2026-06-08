<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class RoleAndUserSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Buat Role
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $userRole  = Role::firstOrCreate(['name' => 'user']);

        // 2. Buat User Admin
        $admin = User::firstOrCreate(
            ['email' => 'admin@smartapply.com'],
            [
                'name'     => 'Admin SmartApply',
                'password' => Hash::make('password'),
            ]
        );
        $admin->assignRole($adminRole);

        // 3. Buat User Pelamar Contoh
        $user = User::firstOrCreate(
            ['email' => 'pelamar@smartapply.com'],
            [
                'name'     => 'Budi Pelamar',
                'password' => Hash::make('password'),
            ]
        );
        $user->assignRole($userRole);
    }
}