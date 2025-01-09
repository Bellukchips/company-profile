<?php

namespace Database\Seeders;

use App\Models\Role\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = Role::where('role_name', 'admin')->first();
        $data = [
            [
                'name' => 'Admin Company',
                'email' => 'admin@company.com',
                'password' => Hash::make('adminpanel123.'),
                'role_id' => $role->id
            ]
        ];

        foreach ($data as $user) {
            User::create($user);
        }
    }
}
