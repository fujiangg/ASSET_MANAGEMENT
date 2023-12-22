<?php

namespace Database\Seeders;

use App\Models\Message;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (Message::count() === 0) {
            Message::create([
                'fullname' => 'Widara sanariato',
                'email' => 'widarariato@gmail.com',
                'phone' => '08123452286547',
                'subject' => 'Feedback',
                'message' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.',
            ]);
            $this->command->info('Successfully seeding.');
        } else {
            $this->command->info('Message table is not empty. Skipping seeding');
        }
    }
}
