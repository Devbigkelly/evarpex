<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
      public function run(): void
    {
        $user = User::firstOrCreate(
            ['email' => 'admin@example.com'], 
            [
                'name' => 'Super Admin',
                'password' => Hash::make('password123'), 
                'user_type' => 'admin',
                'email_verified_at' => now(),
            ]
        );

        // Assign Super Admin role
        if (!$user->hasRole('Super Admin')) {
            $user->assignRole(['Super Admin']);
        }

        echo "✅ Super Admin user seeded successfully.\n";
    }
}