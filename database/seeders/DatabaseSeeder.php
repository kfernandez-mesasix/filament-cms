<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Clear images
        Storage::deleteDirectory('public');

        // Create Admin User
        $this->command->warn(PHP_EOL . 'Creating admin user...');
        $adminUser = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        $this->command->info('Admin user created.');

        // Create Super Admin Role
        $this->command->warn(PHP_EOL . 'Creating super_admin role...');
        $superAdminRole = Role::create(['name' => 'super_admin']);
        $this->command->info('Super_admin role created.');

        // Assign All Permissions to Super Admin
        $this->command->warn(PHP_EOL . 'Assigning all permissions to super_admin role...');
        $permissions = Permission::all();
        $superAdminRole->syncPermissions($permissions);
        $this->command->info('All permissions assigned to super_admin role.');

        // Assign Role to Admin User
        $this->command->warn(PHP_EOL . 'Assigning super_admin role to test@example.com...');
        $adminUser->assignRole($superAdminRole);
        $this->command->info('Super_admin role assigned to test@example.com.');
    }
}
