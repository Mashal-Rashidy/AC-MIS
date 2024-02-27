<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = Permission::get();
        $role = Role::create([
            'name' => 'Super Admin',
            'guard_name' => 'web',
        ]);
        $role->syncPermissions($permissions);

        $user = User::create([
            'name' => 'Administrator',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
            'image' => 'm.jpeg',
        ]);
        $user->assignRole($role);
    }
}
