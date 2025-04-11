<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::truncate(); // Optional: clears existing users

        User::create([
            'name' => 'Test Admin One',
            'email' => 'test@adordn.com',
            'password' => Hash::make('Test@adornIt.'), 
        ]);

        User::create([
            'name' => 'Another Test User',
            'email' => 'test2@adorn.com',
            'password' => Hash::make('Test@adornIt.'),
        ]);
    }
}
