<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            ['name' => 'Super Admin', 'email' => 'admin@admin.com', 'role' => 'super_admin'],
            ['name' => 'Admin Gudang A', 'email' => 'gudang-a@admin.com', 'role' => 'warehouse_admin'],
            ['name' => 'Admin Gudang B', 'email' => 'gudang-b@admin.com', 'role' => 'warehouse_admin'],
            ['name' => 'Staf A', 'email' => 'staf-a@admin.com', 'role' => 'user'],
            ['name' => 'Staf B', 'email' => 'staf-b@admin.com', 'role' => 'user'],
        ];

        foreach ($users as $data) {
            $user = User::firstOrCreate(
                ['email' => $data['email']],
                ['name' => $data['name'], 'password' => Hash::make('password')]
            );
            $user->assignRole($data['role']);
        }
    }
}
