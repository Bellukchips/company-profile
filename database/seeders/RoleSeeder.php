<?php

namespace Database\Seeders;

use App\Models\Role\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'role_name' => 'admin'
            ],
            [
                'role_name' => 'user'
            ]
        ];

        foreach ($data as $role) {
            Role::create($role);
        }

        // User::where('email', 'admin@company.com')->update(['role_id' => 1]);
    }
}
