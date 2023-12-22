<?php

namespace Database\Seeders;

use App\Models\OurProject;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OurProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (OurProject::count() === 0) {
            // Seed new data
            OurProject::create([
                'projectname' => 'Project Name 1',
                'projectdescription' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                'projectdetail' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.',
                'projectimage' => 'Project_Image_1.jpg', // Make sure to have the image in the public/OurProjectImages directory
            ]);

            OurProject::create([
                'projectname' => 'Project Name 2',
                'projectdescription' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                'projectdetail' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.',
                'projectimage' => 'Project_Image_2.jpg', // Make sure to have the image in the public/OurProjectImages directory
            ]);

            OurProject::create([
                'projectname' => 'Project Name 3',
                'projectdescription' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                'projectdetail' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.',
                'projectimage' => 'Project_Image_3.jpg', // Make sure to have the image in the public/OurProjectImages directory
            ]);

            OurProject::create([
                'projectname' => 'Project Name 4',
                'projectdescription' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                'projectdetail' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.',
                'projectimage' => 'Project_Image_4.jpg', // Make sure to have the image in the public/OurProjectImages directory
            ]);

            OurProject::create([
                'projectname' => 'Project Name 5',
                'projectdescription' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                'projectdetail' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.',
                'projectimage' => 'Project_Image_5.jpg', // Make sure to have the image in the public/OurProjectImages directory
            ]);

            OurProject::create([
                'projectname' => 'Project Name 6',
                'projectdescription' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                'projectdetail' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.',
                'projectimage' => 'Project_Image_6.jpg', // Make sure to have the image in the public/OurProjectImages directory
            ]);
            $this->command->info('Successfully seeding.');
        } else {
            $this->command->info('OurProject table is not empty. Skipping seeding');
        }
    }
}

