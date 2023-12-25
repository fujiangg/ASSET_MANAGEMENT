<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (User::count() === 0) {
            User::create([
                'role_name' => 1,
                'name' => 'Fuji Anggraeni', 
                'email' => 'superadmin@gmail.com',
                'phone' => '0881023182562',
                'password'=>Hash::make('superadminpw'),
                ]);
            $this->command->info('Successfully seeding.');
        } else {
            $this->command->info('Users table is not empty. Skipping seeding');
        }
    }
}
