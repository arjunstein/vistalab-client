<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'id' => Str::uuid(),
            'username' => env('ADMIN_USERNAME'),
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt(env('ADMIN_PASSWORD')),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
