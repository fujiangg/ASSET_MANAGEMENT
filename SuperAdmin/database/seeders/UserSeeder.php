<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (User::count() === 0) {
            User::create([
                'name' => 'Nabila Putri', 
                'email' => 'nabilaputri@gmail.com',
                'role' => 1,
                'phone' => '082115450690',
                'picture' => 'no-image.jpg',
                'password'=>Hash::make('superadmin123_'),
                ]);
            $this->command->info('Successfully seeding.');
        } else {
            $this->command->info('Users table is not empty. Skipping seeding');
        }
    }
}
