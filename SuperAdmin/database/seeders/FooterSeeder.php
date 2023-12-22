<?php

namespace Database\Seeders;

use App\Models\Footer;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FooterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Footer::count() === 0) {
            Footer::create([
                'websitelogo' => 'Website_Logo_1.png',
                'locationaddress' => 'Jl. Soekarno Hatta No.501, Cijagra, Kec. Lengkong, Kota Bandung, Jawa Barat 40265',
                'copyrightpage' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.',
                'privacypolicypage' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.',
                'termsofusepage' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.',
                'copyright' => 'Copyright © 2023 Proking Indonesia',
            ]);
            $this->command->info('Successfully seeding.');
        } else {
            $this->command->info('Footer table is not empty. Skipping seeding');
        }
        // You can add more data as needed.
    }
}

