<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder {
    public function run() {
        DB::table('users')->insert([
            [
                'name' => 'Admin User',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('admin'),
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Pimpinan User',
                'email' => 'pimpinan@gmail.com',
                'password' => Hash::make('pimpinan'),
                'role' => 'pimpinan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
