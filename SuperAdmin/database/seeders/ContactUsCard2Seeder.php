<?php

namespace Database\Seeders;

use App\Models\ContactUsCard2;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ContactUsCard2Seeder extends Seeder
{
    public function run()
    {
        if (ContactUsCard2::count() === 0) {
            ContactUsCard2::create([
                'cardtitle' => 'Can’t wait? Send a message!',
                'carddescription' => 'Have a quick question? Fill out this form. If you need to include a picture or file attachment, please use emails.',
                // Add other fields as needed
            ]);
            $this->command->info('Successfully seeding.');
        } else {
            $this->command->info('ContactUsCard2 table is not empty. Skipping seeding');
        }
        // Add more seed data as needed
    }
}
