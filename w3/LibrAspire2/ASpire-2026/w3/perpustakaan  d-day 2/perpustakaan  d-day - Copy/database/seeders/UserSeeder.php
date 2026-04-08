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
        if (!User::where('email', 'ellycia@gmail.com')->exists()) {
            User::create([
                'name' => 'Ellycia Alvarety',
                'email' => 'ellycia@gmail.com',
                'password' => Hash::make('123456'),
                'role' => 'admin',
            ]);
        }
    }
}