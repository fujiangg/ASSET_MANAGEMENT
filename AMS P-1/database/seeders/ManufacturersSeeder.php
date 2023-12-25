<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Manufacturer;

class ManufacturersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (Manufacturer::count() === 0) {
            Manufacturer::create([
                'name' => 'Ixia', 
            ]);

            Manufacturer::create([
                'name' => 'Dell', 
            ]);

            Manufacturer::create([
                'name' => 'Alcatel', 
            ]);           
            $this->command->info('Successfully seeding.');
        } else {
            $this->command->info('Manufacturers table is not empty. Skipping seeding');
        }    
    }
}
