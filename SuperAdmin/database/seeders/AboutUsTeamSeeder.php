<?php

namespace Database\Seeders;

use App\Models\AboutUsTeam;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AboutUsTeamSeeder extends Seeder
{
    public function run()
    {
        // You can adjust this data based on your model and database structure
        if (AboutUsTeam::count() === 0) {
            AboutUsTeam::create([
                'fullname' => 'Fuji Anggraeni',
                'jobposition' => 'Back-End Developer',
                'instagramlink' => 'https://www.instagram.com/fujianggr_/ ',
                'linkedinlink' => 'https://www.linkedin.com/in/fuji-anggraeni-29371825b/',
                'profilepicture' => 'website_image_1.png', // provide the default image file name
            ]);

            AboutUsTeam::create([
                'fullname' => 'Nabila Putri',
                'jobposition' => 'Back-End Developer',
                'instagramlink' => 'https://www.instagram.com/nabilaptrnaa_/ ',
                'linkedinlink' => 'https://www.linkedin.com/in/nabila-putri-nur-alya-475a10283/',
                'profilepicture' => 'website_image_2.jpg', // provide the default image file name
            ]);

            
            AboutUsTeam::create([
                'fullname' => 'Pera Rahmawati',
                'jobposition' => 'Front-End Developer',
                'instagramlink' => 'https://www.instagram.com/pera.rhmwt/ ',
                'linkedinlink' => 'https://www.linkedin.com/in/pera-rahmawati/',
                'profilepicture' => 'website_image_3.jpg', // provide the default image file name
            ]);
            $this->command->info('Successfully seeding.');
        } else {
            $this->command->info('AboutUsTeam table is not empty. Skipping seeding');
        } 
    }
}