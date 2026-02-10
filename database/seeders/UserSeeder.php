<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin User
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@lsp.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
            'status' => 'aktif',
        ]);

        // Asesor User
        User::create([
            'name' => 'Asesor Demo',
            'email' => 'asesor@lsp.com',
            'password' => Hash::make('asesor123'),
            'role' => 'asesor',
            'status' => 'aktif',
        ]);

        // Asesi User
        User::create([
            'name' => 'Asesi Demo',
            'email' => 'asesi@lsp.com',
            'password' => Hash::make('asesi123'),
            'role' => 'asesi',
            'status' => 'aktif',
        ]);
    }
}