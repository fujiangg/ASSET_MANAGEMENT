<?php

namespace Database\Seeders;

use App\Models\ContactUsCard1;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ContactUsCard1Seeder extends Seeder
{
    public function run()
    {
        if (ContactUsCard1::count() === 0) {
            ContactUsCard1::create([
                'cardtitle' => 'Let’s talk with us!',
                'carddescription' => 'We take pride in our friendly customer care! Reach out and we’ll help you however we can.',
                'day' => 'Monday – Friday',
                'time' => '8:00 A.M. – 5:00 P.M',
                'phonenumber' => '+62-22-7351 7098',
                'emailaddress' => 'marketing@eltran.co.id',
                'locationaddress' => 'Jl. Soekarno Hatta No.501, Cijagra, Kec. Lengkong, Kota Bandung, Jawa Barat 40265',
                'facebooklink' => 'https://eltran.co.id/',
                'twitterlink' => 'https://eltran.co.id/',
                'instagramlink' => 'https://eltran.co.id/',
                'linkedinlink' => 'https://eltran.co.id/',
                // Add other fields as needed
            ]);
            $this->command->info('Successfully seeding.');
        } else {
            $this->command->info('ContactUsCard1 table is not empty. Skipping seeding');
        }
        // Add more seed data as needed
    }
}
