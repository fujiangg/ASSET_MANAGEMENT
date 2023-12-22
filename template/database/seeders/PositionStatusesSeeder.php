<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PositionStatus;

class PositionStatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (PositionStatus::count() === 0) {
            PositionStatus::create([
                'name' => 'Warehouse', 
            ]);

            PositionStatus::create([
                'name' => 'On Delivery', 
            ]);

            PositionStatus::create([
                'name' => 'Onsite', 
            ]);
            $this->command->info('Successfully seeding.');
        } else {
            $this->command->info('Position Statuses table is not empty. Skipping seeding');
        }    
    }
}
