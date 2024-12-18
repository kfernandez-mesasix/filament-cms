<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
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

        $this->call([
            ShieldSeeder::class
        ]);

        // Create Admin User
        $this->command->warn(PHP_EOL . 'Creating super admin user...');
        $adminUser = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        $this->command->info('Super Admin user created.');


        // Assign Role to Admin User
        $superAdminRole = 'super_admin';
        $this->command->warn(PHP_EOL . 'Assigning super_admin role to test@example.com...');
        $adminUser->assignRole($superAdminRole);
        $this->command->info('super_admin role assigned to test@example.com.');
    }
}
