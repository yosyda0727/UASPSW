<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password')
        ]);

        $admin->assignRole('admin');

        $user = User::create([
            'name' => 'user',
            'email' => 'user@gamail.com',
            'password' => bcrypt('password')
        ]);

        $user->assignRole('user');
    }


}
