<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Seed an admin user.
     */
    public function run(): void
    {
        $email = env('ADMIN_EMAIL', 'admin@mindly.com');
        $password = env('ADMIN_PASSWORD', 'kelompok5');

        User::updateOrCreate(
            ['email' => $email],
            [
                'name' => 'Administrator',
                'role' => 'admin',
                'password' => Hash::make($password),
                'email_verified_at' => now(),
            ]
        );
    }
}
