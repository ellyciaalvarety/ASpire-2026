<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
           'name' => 'Super Admin',
            'email' => 'superadmin@gmail.com',
            'password' => Hash::make('123456'),
            'role' => 'superadmin',
            'foto' => 'default.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('users')->insert([
           'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123456'),
            'role' => 'admin',
            'foto' => 'default.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('users')->insert([
           'name' => 'Member',
            'email' => 'member@gmail.com',
            'password' => Hash::make('123456'),
            'role' => 'member',
            'foto' => 'default.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}