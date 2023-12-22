<?php

namespace Database\Seeders;

use App\Models\PortalLogin;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PortalLoginSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (PortalLogin::count() === 0) {
            PortalLogin::create([
                'projectname' => 'AMS P-1',
                'projectlink' => 'http://127.0.0.1:8002',
            ]);
            $this->command->info('Successfully seeding.');
        } else {
            $this->command->info('OurProject table is not empty. Skipping seeding');
        }
    }
}