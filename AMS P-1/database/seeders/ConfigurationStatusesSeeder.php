<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ConfigurationStatus;

class ConfigurationStatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (ConfigurationStatus::count() === 0) {
            ConfigurationStatus::create([
                'name' => 'Unconfigured', 
            ]);

            ConfigurationStatus::create([
                'name' => 'Preconfigured', 
            ]);

            ConfigurationStatus::create([
                'name' => 'Installed', 
            ]);

            ConfigurationStatus::create([
                'name' => 'Configured', 
            ]);

            ConfigurationStatus::create([
                'name' => 'Tested', 
            ]);
            $this->command->info('Successfully seeding.');
        } else {
            $this->command->info('Configuration Statuses table is not empty. Skipping seeding');
        } 
    }
}
