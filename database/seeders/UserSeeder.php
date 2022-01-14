<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            'name' => 'Harun Doğdu',
            'email' => 'harundogdu06@gmail.com',
            'type' => 'admin',
            'password' => bcrypt(12345678), // 12345678
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
