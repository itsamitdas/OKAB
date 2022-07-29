<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => '$2y$10$92IXUNpkjO0rOQ5byMi',
            'role' => json_encode(['ROLE_ADMIN','ROLE_EDITOR','ROLE_USER'])
        ],
        );
        User::factory()->create([
            'name' => 'manager',
            'email' => 'manager@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => '$2y$10$92IXUNpkjO0rOQ5byMi',
            'role' => json_encode(['ROLE_MANAGER','ROLE_EDITOR','ROLE_USER'])
        ],
        );
        User::factory()->create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => '$2y$10$92IXUNpkjO0rOQ5byMi',
            'role' => json_encode(['ROLE_USER'])
        ],
        );
    }
}
