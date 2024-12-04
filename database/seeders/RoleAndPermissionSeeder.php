<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::create(['name' => 'Admin']);
        $editorRole = Role::create(['name' => 'Editor']);

        $manageUsersPermission = Permission::create(['name' => 'manage users']);
        $managePostsPermission = Permission::create(['name' => 'manage posts']);
        $managePagesPermission = Permission::create(['name' => 'manage pages']);

        $adminRole->givePermissionTo([$manageUsersPermission, $managePostsPermission, $managePagesPermission]);
        $editorRole->givePermissionTo([$managePostsPermission, $managePagesPermission]);

        $user = \App\Models\User::first();
        $user->assignRole('Admin');
    }
}
